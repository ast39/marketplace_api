<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderPosition extends Model {

    use HasFactory, Filterable;


    protected $table         = 'order_positions';

    protected $primaryKey    = 'record_id';

    protected $keyType       = 'int';


    public    $incrementing  = true;

    public    $timestamps    = true;


    /**
     * Product info
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }


    protected $with = [

        'product',
    ];

    protected $appends = [
        //
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    protected $fillable = [
        'record_id', 'order_id', 'product_id', 'price', 'discount', 'amount',
        'created_at', 'updated_at',
    ];

    protected $hidden = [
        //
    ];
}
