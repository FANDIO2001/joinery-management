@extends('layouts.dashboard')

@section('content')
<div id="categories-edit">
    <div style="padding:24px; max-width:800px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:24px;">
            <div>
                <h1 style="font-size:24px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Modifier une Catégorie
                </h1>
                <p style="color:#6b7280; margin:4px 0 0;">
                    Mettre à jour les informations de la catégorie
                </p>
            </div>
            <a href="{{ route('settings.categories') }}"
                style="display:flex; align-items:center; gap:8px;
                       padding:10px 18px; background:#6b7280;
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer; text-decoration:none;">
                ← Retour
            </a>
        </div>

        <!-- Formulaire -->
        <div style="background:white; border-radius:12px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:32px;">
            <form action="{{ route('settings.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nom de la catégorie -->
                <div style="margin-bottom:20px;">
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Nom de la Catégorie *
                    </label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}"
                        placeholder="Ex: Meubles, Fenêtres, Portes"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'"
                        required>
                    @error('name')
                        <span style="color:#ef4444; font-size:13px; margin-top:4px; display:block;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description -->
                <div style="margin-bottom:20px;">
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Description
                    </label>
                    <textarea name="description" rows="4"
                        placeholder="Décrivez cette catégorie"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s; font-family:inherit; resize:vertical;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <span style="color:#ef4444; font-size:13px; margin-top:4px; display:block;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Catégorie Parente -->
                <div style="margin-bottom:20px;">
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Catégorie Parente (Optionnel)
                    </label>
                    <select name="parent_id"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;">
                        <option value="">-- Aucune (Catégorie principale) --</option>
                        @foreach($parentCategories as $cat)
                            @if($cat->id !== $category->id)
                                <option value="{{ $cat->id }}" {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('parent_id')
                        <span style="color:#ef4444; font-size:13px; margin-top:4px; display:block;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Image de la catégorie -->
                <div style="margin-bottom:32px;">
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Image de la Catégorie
                    </label>
                    @if($category->image)
                        <div style="margin-bottom:12px; text-align:center;">
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="max-width:200px; max-height:200px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
                            <p style="color:#6b7280; font-size:12px; margin-top:8px;">Image actuelle</p>
                        </div>
                    @endif
                    <div style="border:2px dashed #e5e7eb; border-radius:8px; padding:20px; text-align:center; background:#f9fafb; cursor:pointer; transition:all 0.2s;" 
                        id="imageDropZone"
                        onmouseover="this.style.borderColor='#10b981'; this.style.background='#ecfdf5'"
                        onmouseout="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
                        <input type="file" name="image" id="imageInput" accept="image/*" style="display:none;" onchange="updateImageFileName(this)">
                        <div style="font-size:24px; margin-bottom:8px;">🖼️</div>
                        <p style="color:#6b7280; margin:0; font-size:14px;">
                            Cliquez ou glissez une image pour changer
                        </p>
                    </div>
                    <script>
                    document.getElementById('imageDropZone').addEventListener('click', function() {
                        document.getElementById('imageInput').click();
                    });
                    function updateImageFileName(input) {
                        if(input.files && input.files[0]) {
                            document.getElementById('imageDropZone').innerHTML = '✅ ' + input.files[0].name;
                        }
                    }
                    </script>
                    @error('image')
                        <span style="color:#ef4444; font-size:13px; margin-top:4px; display:block;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Boutons -->
                <div style="display:flex; gap:12px; justify-content:flex-end;">
                    <a href="{{ route('settings.categories') }}"
                        style="padding:12px 24px; background:#f3f4f6; color:#374151; border:none; border-radius:8px; font-size:15px; font-weight:600; cursor:pointer; text-decoration:none; display:flex; align-items:center; transition:all 0.2s;"
                        onmouseover="this.style.background='#e5e7eb'"
                        onmouseout="this.style.background='#f3f4f6'">
                        ✕ Annuler
                    </a>
                    <form action="{{ route('settings.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            style="padding:12px 24px; background:#ef4444; color:white; border:none; border-radius:8px; font-size:15px; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(239,68,68,0.3); transition:all 0.2s; margin-right:8px;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(239,68,68,0.4)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(239,68,68,0.3)'"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie?')">
                            🗑️ Supprimer
                        </button>
                    </form>
                    <button type="submit" 
                        style="padding:12px 24px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:15px; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3); transition:all 0.2s;"
                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                        ✓ Mettre à Jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
