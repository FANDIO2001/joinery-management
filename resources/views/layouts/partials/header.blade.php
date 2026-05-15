@php
    $headerTitle = trim($__env->yieldContent('page_title')) ?: trim($__env->yieldContent('title')) ?: 'Tableau de bord';
    $headerSubtitle = trim($__env->yieldContent('page_subtitle')) ?: trim($__env->yieldContent('subtitle'));
    if (!$headerSubtitle) {
        $headerSubtitle = 'Vue d\'ensemble de l\'activité • '.date('d/m/Y');
    }
@endphp

<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 py-5 sm:px-6 lg:px-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-xl font-semibold text-gray-900">{{ $headerTitle }}</h1>
            <p class="text-sm text-gray-500 mt-1">{{ $headerSubtitle }}</p>
        </div>
        <div class="flex items-center gap-3">
            @yield('header_actions')
        </div>
    </div>
</header>
