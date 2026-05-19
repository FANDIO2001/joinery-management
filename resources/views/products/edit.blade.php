@extends('layouts.dashboard')

@section('title', 'Produits')
@section('subtitle', 'Modifier un produit')

@section('content')
    <div id="products-edit">
        <div style="padding:24px; max-width:800px; margin:0 auto;">

            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
                <div>
                    <h1 style="font-size:24px; font-weight:700; color:#1f2937; margin:0;">Modifier un produit</h1>
                    <p style="color:#6b7280; margin:4px 0 0;">{{ $product->name }} — {{ $product->sku }}</p>
                </div>
                <a href="{{ route('products.index') }}"
                    style="display:flex; align-items:center; gap:8px; padding:10px 18px; background:#6b7280; color:white; border-radius:8px; font-size:14px; font-weight:500; text-decoration:none;">
                    ← Retour
                </a>
            </div>

            @if ($errors->any())
                <div
                    style="background:#fef2f2; border:1px solid #fecaca; color:#b91c1c; border-radius:8px; padding:16px; margin-bottom:24px;">
                    <ul style="margin:0; padding-left:20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div
                style="background:white; border-radius:12px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:32px;">
                <form id="productEditForm" action="{{ route('products.update', $product) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom:20px;">
                        <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Nom
                            du produit *</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}"
                            placeholder="Entrez le nom du produit" required
                            style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; box-sizing:border-box; outline:none;"
                            onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                    </div>

                    <div style="margin-bottom:20px;">
                        <label
                            style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Référence
                            *</label>
                        <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" placeholder="REF-XXXX"
                            required
                            style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; box-sizing:border-box; outline:none;"
                            onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                    </div>

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
                        <div>
                            <label
                                style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Catégorie
                                *</label>
                            <select name="category_id" required
                                style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; box-sizing:border-box; outline:none; background:white;">
                                <option value="">Sélectionner...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label
                                style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Prix
                                (FCFA) *</label>
                            <input type="number" name="base_price" value="{{ old('base_price', $product->base_price) }}"
                                placeholder="0" min="0" step="0.01" required
                                style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; box-sizing:border-box; outline:none;"
                                onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        </div>
                    </div>

                    <div style="margin-bottom:20px;">
                        <label
                            style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Description</label>
                        <textarea name="description" rows="4" placeholder="Décrivez le produit..."
                            style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; box-sizing:border-box; outline:none; resize:vertical;"
                            onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">{{ old('description', $product->description) }}</textarea>
                    </div>

                    {{-- Images existantes --}}
                    @if ($product->images->isNotEmpty())
                        <div id="existing-images-section" style="margin-bottom:24px;">
                            <label
                                style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                                Images actuelles
                            </label>
                            <p style="color:#6b7280; font-size:13px; margin:0 0 12px;">
                                Cochez « Supprimer » pour retirer une image. Cliquez « Principale » pour définir l'image de
                                couverture.
                            </p>
                            <div id="existingImagesGrid"
                                style="display:grid; grid-template-columns:repeat(auto-fill, minmax(140px, 1fr)); gap:12px;">
                                @foreach ($product->images as $image)
                                    <div class="existing-image-card" data-image-id="{{ $image->id }}"
                                        style="position:relative; border-radius:8px; overflow:hidden; border:2px solid {{ $image->is_primary ? '#10b981' : '#e5e7eb' }}; aspect-ratio:1; background:#f3f4f6;">
                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                            alt="{{ $image->alt_text ?? $product->name }}"
                                            style="width:100%; height:100%; object-fit:cover; display:block;">
                                        @if ($image->is_primary)
                                            <span
                                                style="position:absolute; top:6px; left:6px; background:#10b981; color:white; font-size:11px; font-weight:600; padding:2px 6px; border-radius:4px;">Principale</span>
                                        @endif
                                        <div
                                            style="position:absolute; bottom:0; left:0; right:0; padding:6px; background:linear-gradient(transparent,rgba(0,0,0,0.85)); display:flex; flex-direction:column; gap:4px;">
                                            <label
                                                style="display:flex; align-items:center; gap:4px; color:white; font-size:11px; cursor:pointer;">
                                                <input type="checkbox" name="remove_images[]" value="{{ $image->id }}"
                                                    class="remove-image-cb">
                                                Supprimer
                                            </label>
                                            <label
                                                style="display:flex; align-items:center; gap:4px; color:white; font-size:11px; cursor:pointer;">
                                                <input type="radio" name="primary_image_id" value="{{ $image->id }}"
                                                    @checked(old('primary_image_id', $product->images->firstWhere('is_primary', true)?->id) == $image->id)>
                                                Principale
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Nouvelles images --}}
                    <div id="product-images-section" style="margin-bottom:24px;">
                        <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                            {{ $product->images->isNotEmpty() ? 'Ajouter des images' : 'Images du produit' }}
                        </label>

                        <input type="file" id="productImagesInput" name="images[]"
                            accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" multiple style="display:none;">

                        <div id="productImagesDropZone"
                            style="border:2px dashed #d1d5db; border-radius:12px; padding:28px 20px; text-align:center; background:#f9fafb; cursor:pointer;">
                            <div style="font-size:32px; margin-bottom:8px;">📷</div>
                            <p style="color:#374151; margin:0 0 4px; font-size:15px; font-weight:600;">Cliquez ou glissez
                                vos images ici</p>
                            <p style="color:#6b7280; margin:0; font-size:13px;">
                                Ajoutez plusieurs fichiers (JPG, PNG, GIF, WebP — max 5 Mo chacun).
                            </p>
                            <button type="button" id="productImagesBrowseBtn"
                                style="margin-top:16px; padding:10px 20px; background:white; border:2px solid #10b981; color:#059669; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer;">
                                + Ajouter des images
                            </button>
                        </div>

                        <div id="productImagesPreview"
                            style="margin-top:16px; display:none; grid-template-columns:repeat(auto-fill, minmax(120px, 1fr)); gap:12px;">
                        </div>
                        <p id="productImagesCount" style="color:#6b7280; font-size:13px; margin:12px 0 0; display:none;">
                        </p>

                        @error('images')
                            <span
                                style="color:#ef4444; font-size:13px; margin-top:8px; display:block;">{{ $message }}</span>
                        @enderror
                        @error('images.*')
                            <span
                                style="color:#ef4444; font-size:13px; margin-top:8px; display:block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="display:flex; gap:24px; margin-bottom:24px; flex-wrap:wrap;">
                        <label
                            style="display:flex; align-items:center; gap:10px; font-size:15px; color:#374151; cursor:pointer; background:#f9fafb; padding:12px 16px; border-radius:8px; border:1px solid #e5e7eb;">
                            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product->status === 'active'))
                                style="width:18px; height:18px; cursor:pointer;">
                            Produit actif
                        </label>
                        <label
                            style="display:flex; align-items:center; gap:10px; font-size:15px; color:#374151; cursor:pointer; background:#f9fafb; padding:12px 16px; border-radius:8px; border:1px solid #e5e7eb;">
                            <input type="checkbox" name="is_customizable" value="1" @checked(old('is_customizable', $product->is_customizable))
                                style="width:18px; height:18px; cursor:pointer;">
                            Personnalisable
                        </label>
                    </div>

                    <div
                        style="display:flex; gap:15px; padding-top:24px; border-top:1px solid #e5e7eb; justify-content:flex-end;">
                        <a href="{{ route('products.index') }}"
                            style="display:inline-flex; align-items:center; justify-content:center; padding:12px 28px; background:#6b7280; color:white; border-radius:8px; font-size:15px; font-weight:600; text-decoration:none;">
                            Annuler
                        </a>
                        <button type="submit"
                            style="padding:12px 28px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:15px; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function() {
            const MAX_SIZE = 5 * 1024 * 1024;
            const ACCEPTED = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];

            const form = document.getElementById('productEditForm');
            const fileInput = document.getElementById('productImagesInput');
            const dropZone = document.getElementById('productImagesDropZone');
            const browseBtn = document.getElementById('productImagesBrowseBtn');
            const preview = document.getElementById('productImagesPreview');
            const countEl = document.getElementById('productImagesCount');

            if (!form || !fileInput) return;

            let selectedFiles = [];
            let previewUrls = [];

            function fileKey(file) {
                return file.name + '|' + file.size + '|' + file.lastModified;
            }

            function isValidImage(file) {
                if (!ACCEPTED.includes(file.type)) {
                    alert('Format non supporté : ' + file.name);
                    return false;
                }
                if (file.size > MAX_SIZE) {
                    alert('Fichier trop volumineux : ' + file.name + ' (max 5 Mo)');
                    return false;
                }
                return true;
            }

            function addFiles(fileList) {
                const existing = new Set(selectedFiles.map(fileKey));
                Array.from(fileList).forEach(function(file) {
                    if (!isValidImage(file)) return;
                    const key = fileKey(file);
                    if (existing.has(key)) return;
                    existing.add(key);
                    selectedFiles.push(file);
                });
                renderPreview();
                syncInputFiles();
            }

            function syncInputFiles() {
                const dt = new DataTransfer();
                selectedFiles.forEach(function(file) {
                    dt.items.add(file);
                });
                fileInput.files = dt.files;
            }

            function revokeUrls() {
                previewUrls.forEach(function(url) {
                    URL.revokeObjectURL(url);
                });
                previewUrls = [];
            }

            function renderPreview() {
                revokeUrls();
                preview.innerHTML = '';

                if (selectedFiles.length === 0) {
                    preview.style.display = 'none';
                    countEl.style.display = 'none';
                    return;
                }

                preview.style.display = 'grid';
                countEl.style.display = 'block';
                countEl.textContent = selectedFiles.length + ' nouvelle(s) image(s) à ajouter';

                selectedFiles.forEach(function(file, index) {
                    const url = URL.createObjectURL(file);
                    previewUrls.push(url);

                    const card = document.createElement('div');
                    card.style.cssText =
                        'position:relative; border-radius:8px; overflow:hidden; border:2px solid #3b82f6; aspect-ratio:1; background:#f3f4f6;';

                    const img = document.createElement('img');
                    img.src = url;
                    img.alt = file.name;
                    img.style.cssText = 'width:100%; height:100%; object-fit:cover; display:block;';

                    const badge = document.createElement('span');
                    badge.textContent = 'Nouveau ' + (index + 1);
                    badge.style.cssText =
                        'position:absolute; top:6px; left:6px; background:#3b82f6; color:white; font-size:11px; font-weight:600; padding:2px 6px; border-radius:4px;';

                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.innerHTML = '×';
                    removeBtn.style.cssText =
                        'position:absolute; top:6px; right:6px; width:24px; height:24px; border:none; border-radius:50%; background:rgba(239,68,68,0.95); color:white; font-size:16px; cursor:pointer;';
                    removeBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        selectedFiles.splice(index, 1);
                        renderPreview();
                        syncInputFiles();
                    });

                    card.appendChild(img);
                    card.appendChild(badge);
                    card.appendChild(removeBtn);
                    preview.appendChild(card);
                });
            }

            function openFilePicker() {
                fileInput.click();
            }

            browseBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                openFilePicker();
            });

            dropZone.addEventListener('click', function(e) {
                if (e.target === browseBtn || browseBtn.contains(e.target)) return;
                openFilePicker();
            });

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length) {
                    addFiles(fileInput.files);
                }
                fileInput.value = '';
            });

            ['dragenter', 'dragover'].forEach(function(eventName) {
                dropZone.addEventListener(eventName, function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropZone.style.borderColor = '#10b981';
                    dropZone.style.background = '#ecfdf5';
                });
            });

            ['dragleave', 'drop'].forEach(function(eventName) {
                dropZone.addEventListener(eventName, function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropZone.style.borderColor = '#d1d5db';
                    dropZone.style.background = '#f9fafb';
                });
            });

            dropZone.addEventListener('drop', function(e) {
                if (e.dataTransfer.files.length) {
                    addFiles(e.dataTransfer.files);
                }
            });

            form.addEventListener('submit', function() {
                syncInputFiles();
            });

            document.querySelectorAll('.remove-image-cb').forEach(function(cb) {
                cb.addEventListener('change', function() {
                    const card = cb.closest('.existing-image-card');
                    if (card) {
                        card.style.opacity = cb.checked ? '0.45' : '1';
                        card.style.outline = cb.checked ? '2px solid #ef4444' : 'none';
                    }
                });
            });
        })();
    </script>
@endpush
