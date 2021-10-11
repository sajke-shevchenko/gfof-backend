<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * The user model.
 *
 * @property int $id User identifier
 * @property string $name User name
 * @property string|null $email User email
 * @property string|null $phone User phone
 * @property string|null $address User address
 *
 * @property-read Order $orders Relation with the order model
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public const ID = 'id';
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PHONE = 'phone';
    public const ADDRESS = 'address';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PHONE,
        self::ADDRESS,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation with the order model.
     *
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
