<!-- Product Form Component -->
<div class="product-form bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
    <!-- Form Header -->
    <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-gray-200">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-gray-900">Informations du produit</h3>
                <p class="text-sm text-gray-600">Remplissez les détails du produit</p>
            </div>
        </div>
    </div>
    
    <form action="#" method="POST" class="p-6 space-y-6">
        @csrf
        
        <!-- Basic Information Section -->
        <div class="space-y-4">
            <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider flex items-center">
                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Informations de base
            </h4>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <label for="product_name" class="block text-sm font-medium text-gray-700 mb-2">Nom du produit *</label>
                    <input type="text" id="product_name" name="product_name" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" placeholder="Entrez le nom du produit" required>
                </div>
                <div>
                    <label for="product_reference" class="block text-sm font-medium text-gray-700 mb-2">Référence *</label>
                    <input type="text" id="product_reference" name="product_reference" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" placeholder="REF-XXXX" required>
                </div>
            </div>
        </div>
        
        <!-- Pricing and Category Section -->
        <div class="space-y-4">
            <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider flex items-center">
                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                </svg>
                Prix et catégorie
            </h4>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <label for="product_category" class="block text-sm font-medium text-gray-700 mb-2">Catégorie *</label>
                    <select id="product_category" name="product_category" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                        <option value="">Sélectionner une catégorie</option>
                        <option value="furniture">Meubles</option>
                        <option value="windows">Fenêtres</option>
                        <option value="doors">Portes</option>
                        <option value="accessories">Accessoires</option>
                    </select>
                </div>
                <div>
                    <label for="product_price" class="block text-sm font-medium text-gray-700 mb-2">Prix (€) *</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">€</span>
                        <input type="number" id="product_price" name="product_price" step="0.01" min="0" class="block w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" placeholder="0.00" required>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stock Management Section -->
        <div class="space-y-4">
            <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider flex items-center">
                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                Gestion du stock
            </h4>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="current_stock" class="block text-sm font-medium text-gray-700 mb-2">Stock actuel</label>
                    <input type="number" id="current_stock" name="current_stock" min="0" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" placeholder="0">
                </div>
                <div>
                    <label for="min_stock" class="block text-sm font-medium text-gray-700 mb-2">Stock minimum</label>
                    <input type="number" id="min_stock" name="min_stock" min="0" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" placeholder="0">
                </div>
                <div>
                    <label for="max_stock" class="block text-sm font-medium text-gray-700 mb-2">Stock maximum</label>
                    <input type="number" id="max_stock" name="max_stock" min="0" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" placeholder="100">
                </div>
            </div>
        </div>
        
        <!-- Description Section -->
        <div class="space-y-4">
            <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider flex items-center">
                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Description
            </h4>
            
            <div>
                <label for="product_description" class="block text-sm font-medium text-gray-700 mb-2">Description du produit</label>
                <textarea id="product_description" name="product_description" rows="4" class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors resize-none" placeholder="Décrivez le produit en détail..."></textarea>
            </div>
        </div>
        
        <!-- Media Section -->
        <div class="space-y-4">
            <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider flex items-center">
                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Médias
            </h4>
            
            <div>
                <label for="product_image" class="block text-sm font-medium text-gray-700 mb-2">Image du produit</label>
                <div class="flex items-center justify-center w-full">
                    <label for="product_image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                        <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="text-sm text-gray-600">Cliquez pour uploader une image</p>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 10MB</p>
                    </label>
                    <input type="file" id="product_image" name="product_image" accept="image/*" class="hidden">
                </div>
            </div>
        </div>
        
        <!-- Product Options Section -->
        <div class="space-y-4">
            <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider flex items-center">
                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c-.94 1.543.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426-1.756-2.924-1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c.94-1.543-.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                </svg>
                Options du produit
            </h4>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                    <input type="checkbox" id="is_active" name="is_active" class="mr-3 h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500" checked>
                    <div>
                        <span class="text-sm font-medium text-gray-900">Produit actif</span>
                        <p class="text-xs text-gray-500">Visible dans le catalogue</p>
                    </div>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                    <input type="checkbox" id="is_featured" name="is_featured" class="mr-3 h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <div>
                        <span class="text-sm font-medium text-gray-900">Produit en vedette</span>
                        <p class="text-xs text-gray-500">Mis en avant sur la page d'accueil</p>
                    </div>
                </label>
                <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                    <input type="checkbox" id="track_stock" name="track_stock" class="mr-3 h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500" checked>
                    <div>
                        <span class="text-sm font-medium text-gray-900">Suivre le stock</span>
                        <p class="text-xs text-gray-500">Alertes automatiques de stock bas</p>
                    </div>
                </label>
            </div>
        </div>
        
        <!-- Form Actions -->
        <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
            <button type="button" class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                Annuler
            </button>
            <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg font-medium hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-md hover:shadow-lg">
                Enregistrer le produit
            </button>
        </div>
    </form>
</div>