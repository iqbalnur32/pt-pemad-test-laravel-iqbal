<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Proyek extends Model
{

  use Notifiable;
  protected $primaryKey = 'id';
  protected $table = 'proyek';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'nama', 'klien_id'
  ];

  protected $guarded = [];

  public function proyek() {
    return $this->hasMany(Proyek::class, 'id');
}
}
