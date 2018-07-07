<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
	protected $primaryKey = 'id';
    // protected $table = 'produks';
    // public $timestamps = false;

    protected $fillable = [
    	'id', 'nama_produk', 'kategori', 'stok', 'harga', 'foto', 'size'
    ];

    protected $dates = [
      'created_at',
      'updated_at',
    ];


    // public function kategori()
    // {
    //     return $this->belongsTo('App\Kategori', 'id_kategori');
    // }
}
