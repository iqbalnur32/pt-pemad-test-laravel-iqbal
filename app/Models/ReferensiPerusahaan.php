<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReferensiPerusahaan extends Model
{
    
  use Notifiable;
  protected $primaryKey = 'id';
  protected $table = 'perusahaan';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'nama', 'jenis', 'nilai'
  ];

  protected $guarded = [];
}
