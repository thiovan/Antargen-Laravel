<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = [
        'name', 'email', 'password', 'fullname', 'no_telp', 'token', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdminToko()
    {
        if($this->admintoko==1) {
            return true;
        }

        return false;
    }

    public function isAdminTransaksi()
    {
        if($this->admintransaksi==1) {
            return true;
        }

        return false;
    }

    public function isManajer()
    {
        if($this->manajer==1) {
            return true;
        }

        return false;
    }

    public function isKurir()
    {
        if($this->kurir==1) {
            return true;
        }

        return false;
    }

    public function isPelanggan()
    {
        if($this->pelanggan==1) {
            return true;
        }

        return false;
    }
}
