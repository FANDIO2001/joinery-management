<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user()->load('clientAddresses');
        $defaultAddress = $this->defaultAddress($user);
        $ordersCount = $user->orders()->count();

        return view('profile.index', compact('user', 'defaultAddress', 'ordersCount'));
    }

    public function edit(): View
    {
        $user = Auth::user()->load('clientAddresses');
        $defaultAddress = $this->defaultAddress($user);

        return view('profile.edit', compact('user', 'defaultAddress'));
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'street' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'country' => ['nullable', 'string', 'max:100'],
        ], [
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
        ]);

        if (! empty($validated['password'])) {
            $user->update(['password' => $validated['password']]);
        }

        $this->syncDefaultAddress($user, $validated);

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profil mis à jour avec succès.');
    }

    public function updateAvatar(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $user->avatar = $request->file('avatar')->store('avatars', 'public');
            $user->save();
        }

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Photo de profil mise à jour.');
    }

    private function defaultAddress($user)
    {
        return $user->clientAddresses->firstWhere('is_default', true)
            ?? $user->clientAddresses->first();
    }

    private function syncDefaultAddress($user, array $validated): void
    {
        $hasAddress = ! empty($validated['street'])
            || ! empty($validated['city'])
            || ! empty($validated['postal_code']);

        if (! $hasAddress) {
            return;
        }

        $address = $user->clientAddresses()->where('is_default', true)->first()
            ?? $user->clientAddresses()->first();

        $payload = [
            'street' => $validated['street'] ?? '',
            'city' => $validated['city'] ?? '',
            'postal_code' => $validated['postal_code'] ?? '',
            'country' => $validated['country'] ?? 'Cameroun',
            'phone' => $validated['phone'] ?? null,
            'is_default' => true,
        ];

        if ($address) {
            $address->update($payload);
        } else {
            $user->clientAddresses()->create(array_merge($payload, [
                'type' => 'billing',
            ]));
        }
    }
}
