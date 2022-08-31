<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Page;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pages(){
        return $this->hasMany(Page::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function isAdminOrEditor() {
        return $this->hasAnyRole(['admin', 'editor']);
    }

    //check to see if a user is in a given role.
    //if it return null, the user is not in any of the provided roles.
    public function hasAnyRole($roles){
     return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role){
     return null !== $this->roles()->where('name', $role)->first();
    }
}
