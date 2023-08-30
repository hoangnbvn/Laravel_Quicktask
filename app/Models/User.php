<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guarded = [
        'is_admin',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

	public function roles(): BelongsToMany
	{
		return $this->belongsToMany(Role::class);
	}

    protected function fullName(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => $this->attributes['first_name'] . ' ' . $this->attributes['last_name'],
		);
	}

	protected function userName(): Attribute
	{
		return Attribute::make(
			set: fn ($value) => Str::slug($value),
		);
	}

    public function scopeIsAdmin($query)
    {
        $query->where('is_admin', true);
    }

    protected static function booted()
    {
        static::addGlobalScope(new ActiveScope);
    }
}
