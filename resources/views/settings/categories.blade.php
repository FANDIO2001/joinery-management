@extends('layouts.dashboard')

@section('content')
<div id="categories-settings">
    <div style="padding:24px; max-width:1200px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    📁 Gestion des Catégories
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Créer et gérer les catégories de produits
                </p>
            </div>
            <a href="{{ route('settings.categories.create') }}" 
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669);
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer;
                       box-shadow:0 4px 12px rgba(16,185,129,0.3);
                       transition:all 0.2s; text-decoration:none;"
                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                ➕ Ajouter une Catégorie
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div style="background:#d1fae5; border:1px solid #6ee7b7; border-radius:8px; padding:16px; margin-bottom:24px; color:#065f46;">
                ✓ {{ $message }}
            </div>
        @endif

        <!-- Categories List -->
        <div style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:24px;">
            @if($categories->isEmpty())
                <div style="text-align:center; padding:40px; color:#6b7280;">
                    <p style="font-size:16px; margin:0;">
                        Aucune catégorie trouvée. Créez votre première catégorie.
                    </p>
                </div>
            @else
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="border-bottom:2px solid #e5e7eb;">
                            <th style="text-align:left; padding:16px; color:#374151; font-weight:600; font-size:14px;">Nom</th>
                            <th style="text-align:left; padding:16px; color:#374151; font-weight:600; font-size:14px;">Description</th>
                            <th style="text-align:left; padding:16px; color:#374151; font-weight:600; font-size:14px;">Sous-catégories</th>
                            <th style="text-align:center; padding:16px; color:#374151; font-weight:600; font-size:14px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr style="border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;" 
                                onmouseover="this.style.backgroundColor='#f9fafb'" 
                                onmouseout="this.style.backgroundColor='white'">
                                <td style="padding:16px; color:#1f2937; font-weight:500;">{{ $category->name }}</td>
                                <td style="padding:16px; color:#6b7280; max-width:300px; word-break:break-word;">
                                    {{ Str::limit($category->description, 50) }}
                                </td>
                                <td style="padding:16px; text-align:center; color:#6b7280;">
                                    <span style="display:inline-block; background:#f3f4f6; padding:4px 12px; border-radius:12px; font-size:12px;">
                                        {{ $category->children->count() }}
                                    </span>
                                </td>
                                <td style="padding:16px; text-align:center;">
                                    <a href="{{ route('settings.categories.edit', $category->id) }}" 
                                        style="background:#3b82f6; color:white; border:none; padding:6px 12px; border-radius:6px; cursor:pointer; font-size:12px; margin-right:6px; text-decoration:none; display:inline-block;"
                                        onmouseover="this.style.background='#2563eb'"
                                        onmouseout="this.style.background='#3b82f6'">
                                        ✏️ Éditer
                                    </a>
                                </td>
                            </tr>
                            @if($category->children->isNotEmpty())
                                @foreach($category->children as $child)
                                    <tr style="border-bottom:1px solid #f3f4f6; background:#fafbfc; padding-left:40px;">
                                        <td style="padding:12px 16px 12px 40px; color:#1f2937;">
                                            └─ {{ $child->name }}
                                        </td>
                                        <td style="padding:12px 16px; color:#6b7280;">
                                            {{ Str::limit($child->description, 50) }}
                                        </td>
                                        <td style="padding:12px 16px; text-align:center; color:#6b7280;">—</td>
                                        <td style="padding:12px 16px; text-align:center;">
                                            <a href="{{ route('settings.categories.edit', $child->id) }}" 
                                                style="background:#3b82f6; color:white; border:none; padding:4px 8px; border-radius:4px; cursor:pointer; font-size:11px; margin-right:4px; text-decoration:none; display:inline-block;">
                                                ✏️
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

@endsection