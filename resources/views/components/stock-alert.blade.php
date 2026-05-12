<!-- Stock Alert Form Component -->
<div class="stock-alert-form bg-white rounded-lg shadow-md border-l-4 border-yellow-500 p-4 mb-4">
    <form action="#" method="POST" class="space-y-4">
        @csrf
        
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="ml-3 flex-1">
                <h3 class="text-sm font-medium text-gray-900">Alerte de stock</h3>
                
                <!-- Product Selection -->
                <div class="mt-3">
                    <label for="product" class="block text-sm font-medium text-gray-700 mb-1">Produit</label>
                    <select id="product" name="product" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        <option value="">Sélectionner un produit</option>
                        <option value="product1">Produit 1</option>
                        <option value="product2">Produit 2</option>
                    </select>
                </div>
                
                <!-- Stock Levels -->
                <div class="mt-3 grid grid-cols-3 gap-2">
                    <div>
                        <label for="current_stock" class="block text-sm font-medium text-gray-700 mb-1">Stock actuel</label>
                        <input type="number" id="current_stock" name="current_stock" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" placeholder="0">
                    </div>
                    <div>
                        <label for="min_stock" class="block text-sm font-medium text-gray-700 mb-1">Minimum</label>
                        <input type="number" id="min_stock" name="min_stock" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" placeholder="0">
                    </div>
                    <div>
                        <label for="max_stock" class="block text-sm font-medium text-gray-700 mb-1">Maximum</label>
                        <input type="number" id="max_stock" name="max_stock" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" placeholder="100">
                    </div>
                </div>
                
                <!-- Alert Type -->
                <div class="mt-3">
                    <label for="alert_type" class="block text-sm font-medium text-gray-700 mb-1">Type d'alerte</label>
                    <select id="alert_type" name="alert_type" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        <option value="warning">Stock faible</option>
                        <option value="danger">Stock critique</option>
                        <option value="success">Stock optimal</option>
                    </select>
                </div>
                
                <!-- Submit Button -->
                <div class="mt-4">
                    <button type="submit" class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 text-white py-2 px-4 rounded-md font-medium hover:from-yellow-600 hover:to-yellow-700 transition-all duration-200 shadow-md hover:shadow-lg">
                        Créer l'alerte
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>