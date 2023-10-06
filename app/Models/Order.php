<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model {

    use HasFactory, Filterable;


    protected $table         = 'orders';

    protected $primaryKey    = 'order_id';

    protected $keyType       = 'int';


    public    $incrementing  = true;

    public    $timestamps    = true;


    /**
     * Order owner
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    /**
     * Order positions
     *
     * @return HasMany
     */
    public function positions(): HasMany
    {
        return $this->hasMany(OrderPosition::class, 'order_id', 'order_id');
    }

    /**
     * Order history
     *
     * @return HasMany
     */
    public function history(): HasMany
    {
        return $this->hasMany(OrderLog::class, 'order_id', 'order_id');
    }


    /**
     * Items in order
     *
     * @return int
     */
    public function getItemsAttribute(): int
    {
        return count($this->positions);
    }

    /**
     * Order amount
     *
     * @return int
     */
    public function getAmountAttribute(): int
    {
        return array_sum(array_map(function($e) {
            return $e['price'];
        }, $this->positions->toArray()));
    }

    /**
     * Order discount
     *
     * @return int
     */
    public function getDiscountAttribute(): int
    {
        return array_sum(array_map(function($e) {
            return $e['discount'];
        }, $this->positions->toArray()));
    }

    /**
     * Order total amount
     *
     * @return int
     */
    public function getTotalAmountAttribute(): int
    {
        return array_sum(array_map(function($e) {
            return $e['amount'];
        }, $this->positions->toArray()));
    }


    protected $with = [

        'owner',
        'positions',
        'history',
    ];

    protected $appends = [

        'items',
        'amount',
        'discount',
        'total_amount',
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    protected $fillable = [
        'order_id', 'owner_id', 'about', 'status',
        'created_at', 'updated_at',
    ];

    protected $hidden = [
        //
    ];
}
