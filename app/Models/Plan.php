<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * A model for a product. This groups features
 * and unlocks sections in the UI.
 *
 * An Eloquent Model: 'Product'
 *
 * @property int $id
 * @property string $time_frame
 * @property string $product_id
 * @property string $stripe_plan
 * @property string $price
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read Product $users
 */

class Plan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'stripe_plan',
        'product_id',
        'time_frame',
        'price',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
