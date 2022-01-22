<?php

namespace App\Models;

use App\Notifications\MyResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'direccion',
        'fechan',
        'apellido',
        'phone_number',
        'sexo',

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

    /**Indica si el usuario es adminitrator*/
    public function admin(){

        return $this->role>0 ? true : false;

    }

     //Hacer busquedas por nombre
    public function scopeName($query,$name){
        $query->where('name','like',"%$name%");

    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new  MyResetPassword($token));
    }

}
