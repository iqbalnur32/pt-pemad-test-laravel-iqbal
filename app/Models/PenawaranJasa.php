<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenawaranJasa extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'penawaran_jasa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pekerjaan_id', 'proyek_id', 'harga'
    ];

    protected $guarded = [];

    public function pekerjaan() {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
    }

    public function proyek() {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    public function PenawaranJasa() {
        return $this->hasMany(PenawaranJasa::class, 'id');
    }
}
