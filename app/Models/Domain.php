<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $domain
 * @property mixed $description
 * @property int|mixed $aliases
 * @property int|mixed $mailboxes
 * @property bool|int|mixed $backupmx
 * @property bool|int|mixed $active
 * @method static where(string $string, mixed $get)
 */
class Domain extends Model
{
    use HasFactory;

    protected $table = 'domain';

    protected $primaryKey = 'domain';

    public $incrementing = false;

    public const CREATED_AT = 'created';

    public const UPDATED_AT = 'modified';

    protected $fillable = [
        'domain',
        'description',
        'aliases',
        'mailboxes',
        'backupmx',
        'active'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->description) $model->description = (string) NULL;
            $model->transport = 'virtual';
        });
    }
}
