<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanJasa extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'permintaan_jasa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pekerjaan_id', 'proyek_id'
    ];

    protected $guarded = [];

    public function pekerjaan() {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
    }

    public function proyek() {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }
}
