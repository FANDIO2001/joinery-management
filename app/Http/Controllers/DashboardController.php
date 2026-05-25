<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Material;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Statistiques basées sur le rôle de l'utilisateur
        if ($user->user_type === 'admin') {
            $stats = $this->getAdminStats();
            $recentOrders = $this->getRecentOrdersAdmin();
            $criticalAlerts = $this->getCriticalAlerts();
        } elseif ($user->user_type === 'client') {
            $stats = $this->getClientStats($user);
            $recentOrders = $this->getClientOrders($user);
            $criticalAlerts = [];
        } else {
            // Employee/technician
            $stats = $this->getEmployeeStats($user);
            $recentOrders = $this->getEmployeeOrders();
            $criticalAlerts = [];
        }

        return view('dashboard.index', [
            'stats' => $stats,
            'recentOrders' => $recentOrders,
            'criticalAlerts' => $criticalAlerts,
            'userType' => $user->user_type,
        ]);
    }

    private function getAdminStats()
    {
        $today = now()->startOfDay();
        
        return [
            'ordersToday' => Order::whereDate('created_at', $today)->count(),
            'revenue' => Invoice::where('status', 'paid')
                ->whereDate('paid_at', '>=', now()->startOfMonth())
                ->sum('total_amount'),
            'activeClients' => User::where('user_type', 'client')
                ->where('is_active', true)
                ->count(),
            'criticalStock' => Material::where('current_stock', '<=', DB::raw('minimum_stock'))
                ->count(),
        ];
    }

    private function getClientStats($user)
    {
        return [
            'totalOrders' => $user->orders()->count(),
            'pendingOrders' => $user->orders()->whereIn('status', ['pending', 'confirmed', 'in_production'])->count(),
            'totalSpent' => $user->orders()->where('payment_status', 'paid')->sum('total_amount'),
            'unpaidInvoices' => Invoice::whereHas('order', function ($q) use ($user) {
                $q->where('client_id', $user->id);
            })->where('status', '!=', 'paid')->count(),
        ];
    }

    private function getEmployeeStats($user)
    {
        return [
            'activeTickets' => $user->employee?->tickets()->where('status', 'open')->count() ?? 0,
            'tasksCompleted' => $user->employee?->workOrders()->where('status', 'completed')->count() ?? 0,
            'pendingTasks' => $user->employee?->workOrders()->whereIn('status', ['pending', 'in_progress'])->count() ?? 0,
            'attendance' => $user->employee?->attendances()->whereDate('date', now())->count() ?? 0,
        ];
    }

    private function getRecentOrdersAdmin()
    {
        return Order::with(['client', 'items'])
            ->latest()
            ->take(5)
            ->get();
    }

    private function getClientOrders($user)
    {
        return $user->orders()
            ->with('items')
            ->latest()
            ->take(5)
            ->get();
    }

    private function getEmployeeOrders()
    {
        return Order::with(['client', 'items'])
            ->where('status', '!=', 'cancelled')
            ->latest()
            ->take(5)
            ->get();
    }

    private function getCriticalAlerts()
    {
        $alerts = [];
        
        // Stock critique
        $criticalMaterials = Material::where('current_stock', '<=', DB::raw('minimum_stock'))
            ->take(3)
            ->get();
        
        foreach ($criticalMaterials as $material) {
            $alerts[] = [
                'type' => 'stock',
                'title' => 'Stock critique: ' . $material->name,
                'message' => 'Stock: ' . $material->current_stock . ' ' . $material->unit . ' (minimum: ' . $material->minimum_stock . ')',
                'severity' => 'critical',
                'icon' => '📦',
            ];
        }

        // Factures en retard
        $overdueInvoices = Invoice::where('status', '!=', 'paid')
            ->where('due_date', '<', now()->toDateString())
            ->count();
        
        if ($overdueInvoices > 0) {
            $alerts[] = [
                'type' => 'invoice',
                'title' => 'Factures en retard',
                'message' => $overdueInvoices . ' facture(s) non payée(s)',
                'severity' => 'warning',
                'icon' => '📋',
            ];
        }

        return $alerts;
    }
}
