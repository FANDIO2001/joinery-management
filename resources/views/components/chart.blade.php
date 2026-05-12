<!-- Chart Form Component -->
<div class="chart-form bg-white rounded-lg shadow-md border border-gray-200 p-6">
    <form action="#" method="POST" class="space-y-4">
        @csrf
        
        <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-900">Configuration du graphique</h3>
        </div>
        
        <!-- Chart Type -->
        <div>
            <label for="chart_type" class="block text-sm font-medium text-gray-700 mb-1">Type de graphique</label>
            <select id="chart_type" name="chart_type" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="line">Ligne</option>
                <option value="bar">Barres</option>
                <option value="pie">Camembert</option>
                <option value="doughnut">Donut</option>
            </select>
        </div>
        
        <!-- Chart Title -->
        <div>
            <label for="chart_title" class="block text-sm font-medium text-gray-700 mb-1">Titre du graphique</label>
            <input type="text" id="chart_title" name="chart_title" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Entrez le titre">
        </div>
        
        <!-- Data Source -->
        <div>
            <label for="data_source" class="block text-sm font-medium text-gray-700 mb-1">Source de données</label>
            <select id="data_source" name="data_source" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Sélectionner une source</option>
                <option value="sales">Ventes</option>
                <option value="production">Production</option>
                <option value="stock">Stock</option>
                <option value="orders">Commandes</option>
            </select>
        </div>
        
        <!-- Date Range -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                <input type="date" id="date_from" name="date_from" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">Date de fin</label>
                <input type="date" id="date_to" name="date_to" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>
        
        <!-- Chart Options -->
        <div class="space-y-2">
            <label class="flex items-center">
                <input type="checkbox" id="show_legend" name="show_legend" class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <span class="text-sm text-gray-700">Afficher la légende</span>
            </label>
            <label class="flex items-center">
                <input type="checkbox" id="show_grid" name="show_grid" class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <span class="text-sm text-gray-700">Afficher la grille</span>
            </label>
            <label class="flex items-center">
                <input type="checkbox" id="animate" name="animate" class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <span class="text-sm text-gray-700">Activer l'animation</span>
            </label>
        </div>
        
        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-2 px-4 rounded-md font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-md hover:shadow-lg">
                Générer le graphique
            </button>
        </div>
    </form>
</div>