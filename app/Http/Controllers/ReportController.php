<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Material;
use App\Models\Invoice;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $currentMonth = now()->startOfMonth();
        $previousMonth = now()->subMonth()->startOfMonth();
        
        // KPI - Chiffre d'affaires
        $revenueThisMonth = Invoice::where('status', 'paid')
            ->whereDate('paid_at', '>=', $currentMonth)
            ->sum('total_amount');
        
        $revenuePreviousMonth = Invoice::where('status', 'paid')
            ->whereDate('paid_at', '>=', $previousMonth)
            ->whereDate('paid_at', '<', $currentMonth)
            ->sum('total_amount');
        
        $revenueChange = $revenuePreviousMonth > 0 
            ? (($revenueThisMonth - $revenuePreviousMonth) / $revenuePreviousMonth * 100) 
            : 0;
        
        // KPI - Commandes
        $ordersThisMonth = Order::whereDate('created_at', '>=', $currentMonth)->count();
        $ordersPreviousMonth = Order::whereDate('created_at', '>=', $previousMonth)
            ->whereDate('created_at', '<', $currentMonth)
            ->count();
        
        $ordersChange = $ordersPreviousMonth > 0 
            ? (($ordersThisMonth - $ordersPreviousMonth) / $ordersPreviousMonth * 100) 
            : 0;
        
        // KPI - Clients
        $activeClients = User::where('user_type', 'client')
            ->where('is_active', true)
            ->count();
        
        $newClientsThisMonth = User::where('user_type', 'client')
            ->whereDate('created_at', '>=', $currentMonth)
            ->count();
        
        // KPI - Production
        $totalOrders = Order::where('status', '!=', 'cancelled')->count();
        $completedOrders = Order::where('status', 'delivered')->count();
        $productionEfficiency = $totalOrders > 0 ? round(($completedOrders / $totalOrders) * 100) : 0;
        
        // Sales Report
        $totalRevenue = Invoice::where('status', 'paid')->sum('total_amount');
        $averageSale = $ordersThisMonth > 0 ? round($revenueThisMonth / $ordersThisMonth) : 0;
        $totalSalesOrders = Order::where('status', '!=', 'cancelled')->count();
        
        // Production Report
        $productionOrdersProcessed = Order::where('status', 'delivered')->count();
        $ordersInProgress = Order::whereIn('status', ['confirmed', 'in_production'])->count();
        $delayedOrders = Order::where('status', 'in_production')
            ->where('confirmed_at', '<', now()->subDays(30))
            ->count();
        
        // Stock Report
        $stockValuation = Material::sum(DB::raw('current_stock * unit_cost'));
        $criticalStocks = Material::where('current_stock', '<=', DB::raw('minimum_stock'))->count();
        $totalMovements = DB::table('stock_movements')->count();
        
        // HR Report
        $totalEmployees = Employee::count();
        $absentToday = Attendance::whereDate('attendance_date', now()->toDateString())
            ->where('status', 'absent')
            ->count();
        $totalPayroll = Employee::sum('base_salary');
        
        return view('reports.index', [
            'revenueThisMonth' => $revenueThisMonth,
            'revenueChange' => round($revenueChange, 1),
            'ordersThisMonth' => $ordersThisMonth,
            'ordersChange' => round($ordersChange, 1),
            'activeClients' => $activeClients,
            'newClientsThisMonth' => $newClientsThisMonth,
            'productionEfficiency' => $productionEfficiency,
            'totalRevenue' => $totalRevenue,
            'averageSale' => $averageSale,
            'totalSalesOrders' => $totalSalesOrders,
            'productionOrdersProcessed' => $productionOrdersProcessed,
            'ordersInProgress' => $ordersInProgress,
            'delayedOrders' => $delayedOrders,
            'stockValuation' => $stockValuation,
            'criticalStocks' => $criticalStocks,
            'totalMovements' => $totalMovements,
            'totalEmployees' => $totalEmployees,
            'absentToday' => $absentToday,
            'totalPayroll' => $totalPayroll,
        ]);
    }
}
