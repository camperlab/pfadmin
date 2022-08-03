<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed $username
 * @property mixed|string $password
 * @property int|mixed $superadmin
 * @property int|mixed $active
 * @method static where(string $string, mixed $get)
 */
class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admin';

    public $incrementing = false;

    protected $primaryKey = 'username';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'active'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->phone = $model->email_other = $model->token = (string)NULL;
            $model->token_validity = now();
        });
    }

    /**
     * @return HasMany
     */
    public function domains(): HasMany
    {
        return $this->hasMany(DomainAdmins::class, 'username', 'username');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];
}
