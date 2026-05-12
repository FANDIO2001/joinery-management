<!-- Order Status Form Component -->
<div class="order-status-form bg-white rounded-lg shadow-md border border-gray-200 p-6">
    <form action="#" method="POST" class="space-y-4">
        @csrf
        
        <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-900">Mise à jour du statut de commande</h3>
        </div>
        
        <!-- Order Selection -->
        <div>
            <label for="order_number" class="block text-sm font-medium text-gray-700 mb-1">Numéro de commande</label>
            <input type="text" id="order_number" name="order_number" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500" placeholder="CMD-XXXX">
        </div>
        
        <!-- Order Status -->
        <div>
            <label for="order_status" class="block text-sm font-medium text-gray-700 mb-1">Statut de la commande</label>
            <select id="order_status" name="order_status" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                <option value="pending">En attente</option>
                <option value="processing">En traitement</option>
                <option value="shipped">Expédiée</option>
                <option value="delivered">Livrée</option>
                <option value="cancelled">Annulée</option>
            </select>
        </div>
        
        <!-- Customer Info -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-1">Nom du client</label>
                <input type="text" id="customer_name" name="customer_name" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500" placeholder="Nom du client">
            </div>
            <div>
                <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-1">Email du client</label>
                <input type="email" id="customer_email" name="customer_email" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500" placeholder="email@example.com">
            </div>
        </div>
        
        <!-- Order Details -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="order_total" class="block text-sm font-medium text-gray-700 mb-1">Total de la commande</label>
                <input type="number" id="order_total" name="order_total" step="0.01" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500" placeholder="0.00">
            </div>
            <div>
                <label for="order_date" class="block text-sm font-medium text-gray-700 mb-1">Date de la commande</label>
                <input type="date" id="order_date" name="order_date" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
            </div>
        </div>
        
        <!-- Notes -->
        <div>
            <label for="order_notes" class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
            <textarea id="order_notes" name="order_notes" rows="3" class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500" placeholder="Ajouter des notes sur la commande..."></textarea>
        </div>
        
        <!-- Notification Options -->
        <div class="space-y-2">
            <label class="flex items-center">
                <input type="checkbox" id="notify_customer" name="notify_customer" class="mr-2 rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                <span class="text-sm text-gray-700">Notifier le client par email</span>
            </label>
            <label class="flex items-center">
                <input type="checkbox" id="send_sms" name="send_sms" class="mr-2 rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                <span class="text-sm text-gray-700">Envoyer une notification SMS</span>
            </label>
        </div>
        
        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white py-2 px-4 rounded-md font-medium hover:from-purple-600 hover:to-purple-700 transition-all duration-200 shadow-md hover:shadow-lg">
                Mettre à jour le statut
            </button>
        </div>
    </form>
</div>