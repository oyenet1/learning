<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function lesson()
  {
    return $this->belongsTo(Lesson::class);
  }
  public function user()
  {
    return $this->belongsTo(User::class);
  }


}
