<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produk;

class Kategori extends Model
{
    protected $primaryKey = 'id_kategori';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id_kategori',
       'name',
    ];

    // public function produk()
    // {
    //     return $this->hasMany('App\Produk');
    // }

    public function produk()
    {
        return $this->hasMany('App\Produk');
    }
}
