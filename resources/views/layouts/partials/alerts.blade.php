@if(session('success'))
<div class="bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 mb-4">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 mb-4">
    {{ session('error') }}
</div>
@endif

@if($errors->any())
<div class="bg-yellow-50 border border-yellow-200 text-yellow-900 rounded-lg p-4 mb-4">
    <div class="font-semibold mb-2">Veuillez corriger les erreurs suivantes :</div>
    <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
