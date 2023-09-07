<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Klien extends Model
{

  use Notifiable;
  protected $primaryKey = 'id';
  protected $table = 'klien';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'nama', 'alamat', 'telepon', 'email'
  ];

  protected $guarded = [];
}
