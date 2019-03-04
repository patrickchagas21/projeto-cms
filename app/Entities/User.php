<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   
    use softDeletes;
    use Notifiable;

    public $timestamps = true;
    protected $table = 'tb_users';
    protected $fillable = [
        'nameuser',
        'birth',
        'gender',
        'services',
        'cpf',
        'login',
        'phone',
        'email',
        'password',
        'status',
        'permission',
    ];
    protected $hidden = ['password', 'remember_token'];

    //Criptografar a senha do usuário
    public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }
   
}