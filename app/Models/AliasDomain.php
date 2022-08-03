<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $alias_domain
 * @property mixed $target_domain
 * @property bool|int|mixed $active
 * @method static create(array $array)
 * @method static where(string $string, mixed $get)
 */
class AliasDomain extends Model
{
    use HasFactory;

    protected $table = 'alias_domain';

    public const CREATED_AT = 'created';

    public const UPDATED_AT = 'modified';

    protected $fillable = [
        'alias_domain',
        'target_domain'
    ];
}
