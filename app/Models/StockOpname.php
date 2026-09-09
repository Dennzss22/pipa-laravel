<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockOpname extends Model
{
    protected $fillable = [
        'opname_period_id',
        'user_id',
        'petugas_name',
        'block_id',
        'material_id',
        'pipe_category_id',
        'pipe_size_id',
        'pipe_type_id',
        'pipe_class_id',
        'left_bdl_per_row',
        'left_rows',
        'left_adjust',
        'left_bundles',
        'left_loose',
        'right_bdl_per_row',
        'right_rows',
        'right_adjust',
        'right_bundles',
        'right_loose',
        'total_bundles',
        'total_pcs',
        'total_loose',
        'total_weight',
        'stok_sistem',
        'stok_fisik',
        'selisih',
        'status',
        'reviewed_by',
        'reviewed_at',
        'opname_date',
        'input_date',
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
        'opname_date' => 'date',
    ];

    // Relationships
    public function opnamePeriod(): BelongsTo
    {
        return $this->belongsTo(OpnamePeriod::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function pipeCategory(): BelongsTo
    {
        return $this->belongsTo(PipeCategory::class);
    }

    public function pipeSize(): BelongsTo
    {
        return $this->belongsTo(PipeSize::class);
    }

    public function pipeType(): BelongsTo
    {
        return $this->belongsTo(PipeType::class);
    }

    public function pipeClass(): BelongsTo
    {
        return $this->belongsTo(PipeClass::class);
    }

    // Helpers
    public function getSelisihBadgeAttribute(): string
    {
        if ($this->selisih == 0) return 'bg-green-100 text-green-700';
        if (abs($this->selisih) <= ($this->stok_sistem * 0.05)) return 'bg-yellow-100 text-yellow-700';
        return 'bg-red-100 text-red-700';
    }
}
