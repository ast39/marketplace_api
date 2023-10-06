<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model {

    use HasFactory, Filterable;


    protected $table         = 'products';

    protected $primaryKey    = 'product_id';

    protected $keyType       = 'int';


    public    $incrementing  = true;

    public    $timestamps    = true;


    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }


    public function getOptionsAttribute()
    {
        return json_decode($this->attributes['options'], true);
    }


    protected $with = [
        //
    ];

    protected $appends = [
        //
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    protected $fillable = [
        'product_id', 'category_id', 'title', 'about', 'unit', 'stock', 'price', 'options', 'status',
        'created_at', 'updated_at',
    ];

    protected $hidden = [
        //
    ];
}
