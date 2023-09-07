<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipePekerjaan extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'tipe_pekerjaan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama'
    ];

    protected $guarded = [];

    public function tipepekerjaan() {
        return $this->hasMany(TipePekerjaan::class, 'id');
    }
}
