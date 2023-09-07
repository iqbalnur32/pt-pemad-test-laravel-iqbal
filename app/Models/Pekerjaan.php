<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'pekerjaan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'tipe_pekerjaan_id'
    ];

    protected $guarded = [];

    public function pekerjaan() {
        return $this->hasMany(Pekerjaan::class, 'id');
    }
}
