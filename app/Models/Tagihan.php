<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tagihan extends Model
{

  use Notifiable;
  protected $primaryKey = 'id';
  protected $table = 'tagihan';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'jumlah', 'penawaran_jasa_id'
  ];

  protected $guarded = [];

  public function PenawaranJasa()
  {
    return $this->belongsTo(PenawaranJasa::class, 'penawaran_jasa_id');
  }

  public function tagihan() {
    return $this->hasMany(Tagihan::class, 'id');
  }
  
}
