<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'login',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'profile' => 'array',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function getAvatarTokenAttribute()
    {
        $this->tokens()->where('name', 'avatar')->delete();

        return $this->createToken('avatar')->plainTextToken;
    }

    public function scopeNameExists($query, $name)
    {
        $query->when(config('database.default') === 'pgsql',
            fn ($query) => $query->where('name', 'ilike', $name),
            fn ($query) => $query->whereName($name)
        );
    }
}
