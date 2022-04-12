<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    
    use HasFactory, Notifiable;//, Authenticatable

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
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
        'email_verified_at' => 'datetime',
    ];

    //RELACIONAMENTO 1:1
    public function feirante()
    {
        return $this->hasOne(Feirante::class);
    }

    //RELACIONAMENTO 1:1  
    public function visitante()
    {
        return $this->hasOne(Visitante::class);
    }
    //RELACIONAMENTO 1:1  
    public function vendedor()
    {
        return $this->hasOne(Vendedor::class);
    }
}
