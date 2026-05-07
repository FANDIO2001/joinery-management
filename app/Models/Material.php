<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'name',
        'reference',
        'unit',
        'unit_cost',
        'current_stock',
        'minimum_stock',
        'reorder_quantity',
        'location',
        'type',
    ];

    protected $casts = [
        'unit_cost' => 'decimal:2',
        'current_stock' => 'decimal:3',
        'minimum_stock' => 'decimal:3',
        'reorder_quantity' => 'decimal:3',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function workOrderMaterials(): HasMany
    {
        return $this->hasMany(WorkOrderMaterial::class);
    }

    public function movements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }
}
