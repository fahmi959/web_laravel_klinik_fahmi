<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;// ini tak terpakai


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// nama model harus sesuai dengan nama migration

//  class PuskesmasKecamatanKelurahan extends Model
class PuskesmasKecamatanKelurahan extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

// JADI PENGGANTI id

    protected $primaryKey = 'kode_kd';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['created_at' , 'updated_at'];

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
}
