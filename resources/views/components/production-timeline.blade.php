<!-- Production Timeline Form Component -->
<div class="production-timeline-form bg-white rounded-lg shadow-md border border-gray-200 p-6">
    <form action="#" method="POST" class="space-y-4">
        @csrf
        
        <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-900">Créer une production</h3>
        </div>
        
        <!-- Production Name -->
        <div>
            <label for="production_name" class="block text-sm font-medium text-gray-700 mb-1">Nom de la production</label>
            <input type="text" id="production_name" name="production_name" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Entrez le nom de la production">
        </div>
        
        <!-- Production Reference -->
        <div>
            <label for="production_reference" class="block text-sm font-medium text-gray-700 mb-1">Référence</label>
            <input type="text" id="production_reference" name="production_reference" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="PROD-XXXX">
        </div>
        
        <!-- Production Status -->
        <div>
            <label for="production_status" class="block text-sm font-medium text-gray-700 mb-1">Statut de la production</label>
            <select id="production_status" name="production_status" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="planning">Planification</option>
                <option value="in-progress">En cours</option>
                <option value="completed">Terminé</option>
                <option value="delayed">Retard</option>
                <option value="paused">En pause</option>
            </select>
        </div>
        
        <!-- Dates -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                <input type="date" id="start_date" name="start_date" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Date de fin prévue</label>
                <input type="date" id="end_date" name="end_date" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>
        
        <!-- Priority and Progress -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">Priorité</label>
                <select id="priority" name="priority" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="low">Faible</option>
                    <option value="medium">Moyenne</option>
                    <option value="high">Élevée</option>
                    <option value="urgent">Urgente</option>
                </select>
            </div>
            <div>
                <label for="progress" class="block text-sm font-medium text-gray-700 mb-1">Progression (%)</label>
                <input type="number" id="progress" name="progress" min="0" max="100" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="0">
            </div>
        </div>
        
        <!-- Product Selection -->
        <div>
            <label for="product" class="block text-sm font-medium text-gray-700 mb-1">Produit associé</label>
            <select id="product" name="product" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Sélectionner un produit</option>
                <option value="product1">Produit 1</option>
                <option value="product2">Produit 2</option>
            </select>
        </div>
        
        <!-- Assigned Team -->
        <div>
            <label for="team" class="block text-sm font-medium text-gray-700 mb-1">Équipe assignée</label>
            <select id="team" name="team" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Sélectionner une équipe</option>
                <option value="team1">Équipe A</option>
                <option value="team2">Équipe B</option>
                <option value="team3">Équipe C</option>
            </select>
        </div>
        
        <!-- Production Steps -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Étapes de production</label>
            <div class="space-y-2">
                <label class="flex items-center">
                    <input type="checkbox" name="steps[]" value="planning" class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-gray-700">Planification</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="steps[]" value="cutting" class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-gray-700">Découpe</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="steps[]" value="assembly" class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-gray-700">Assemblage</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="steps[]" value="finishing" class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-gray-700">Finition</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="steps[]" value="quality_check" class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-gray-700">Contrôle qualité</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="steps[]" value="delivery" class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-gray-700">Livraison</span>
                </label>
            </div>
        </div>
        
        <!-- Notes -->
        <div>
            <label for="production_notes" class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
            <textarea id="production_notes" name="production_notes" rows="3" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ajouter des notes sur la production..."></textarea>
        </div>
        
        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-indigo-600 text-white py-2 px-4 rounded-md font-medium hover:from-indigo-600 hover:to-indigo-700 transition-all duration-200 shadow-md hover:shadow-lg">
                Créer la production
            </button>
        </div>
    </form>
</div>