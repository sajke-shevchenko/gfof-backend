<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * The order model.
 *
 * @property string $delivery_date Order delivery date
 *
 * @property-read User $user Relation with the user model
 * @property-read Tariff $tariff Relation with the tariff model
 */
class Order extends Model
{
    public const USER_ID = 'user_id';
    public const TARIFF_ID = 'tariff_id';
    public const DELIVERY_DATE = 'delivery_date';

    protected $fillable = [
      self::DELIVERY_DATE,
    ];

    protected $dates = [
        self::DELIVERY_DATE,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    /**
     * Relation with the user model.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation with the tariff model.
     *
     * @return BelongsTo
     */
    public function tariff(): BelongsTo
    {
        return $this->belongsTo(Tariff::class);
    }
}
