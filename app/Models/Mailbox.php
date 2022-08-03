<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $username
 * @property mixed $domain
 * @property mixed|string $name
 * @property mixed|string $maildir
 * @property mixed|string $password
 * @property int|mixed $quota
 * @property bool|mixed $active
 * @property mixed|string $email_other
 * @property mixed $local_part
 * @property mixed|string $phone
 * @method static where(string $string, mixed $get)
 */
class Mailbox extends Model
{
    use HasFactory;

    public const CREATED_AT = 'created';

    public const UPDATED_AT = 'modified';

    protected $table = 'mailbox';

    protected $primaryKey = 'username';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->phone = $model->token = (string) NULL;
            $model->token_validity = now();
            $model->password_expiry = now()->addYear();
        });
    }

    protected $hidden = [
        'password'
    ];
}
