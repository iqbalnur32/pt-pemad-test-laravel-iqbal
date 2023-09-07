<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReferensiBahasa extends Model
{
    use Notifiable;
    protected $primaryKey = 'id';
    protected $table = 'bahasa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'value'
    ];

    protected $guarded = [];
}
