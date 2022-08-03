<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Alias extends Model
{
    use HasFactory;

    protected $table = 'alias';

    public const CREATED_AT = 'created';

    public const UPDATED_AT = 'modified';

    protected $fillable = [
        'domain',
        'address',
        'goto'
    ];
}
