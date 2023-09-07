<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananPembelian extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'pesanaan_pembelian';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jumlah', 'tipe_pekerjaan_id'
    ];

    protected $guarded = [];

    public function tipepekerjaan() {
        return $this->belongsTo(TipePekerjaan::class, 'tipe_pekerjaan_id');
    }
}
