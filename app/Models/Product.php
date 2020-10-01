<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Subscription;

/**
 * A model for a product. This groups features
 * and unlocks sections in the UI.
 *
 * An Eloquent Model: 'Product'
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $stripe_plan
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read User $users
 * @property-read Feature $features
 */

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'stripe_product',
    ];

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
//     */
//    public function users()
//    {
//        //TODO Make this work for some sweet admin reports
//        return $this->hasManyThrough(User::class, Subscription::class, 'user_id', 'id');
//    }

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function features()
//    {
//        return $this->hasMany(Feature::class);
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'stripe_plan', 'stripe_plan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plans()
    {
        return $this->hasMany(Plan::class, 'product_id');
    }
}
