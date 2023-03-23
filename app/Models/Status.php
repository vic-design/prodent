<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Status
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 * @property integer $code
 */
class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code'
    ];

    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
