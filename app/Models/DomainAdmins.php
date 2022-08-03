<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $username
 * @property mixed $domain
 * @method static create(array $array)
 */
class DomainAdmins extends Model
{
    use HasFactory;

    protected $table = 'domain_admins';

    public const CREATED_AT = 'created';

    public const UPDATED_AT = 'created';

    protected $fillable = [
        'username',
        'domain'
    ];
}
