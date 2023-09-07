<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranPembelian extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'pembayaran_pembelian';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jumlah', 'tagihan_id'
    ];

    protected $guarded = [];

    public function tagihan() {
        return $this->belongsTo(Tagihan::class, 'tagihan_id');
    }
}
