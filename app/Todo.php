<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
  protected $attributes = [
    'completed' => false,
    'position' => 0,
  ];

  protected $maps = ['position' => 'order'];
  protected $hidden = ['created_at', 'updated_at', 'position'];
  protected $fillable = ['title', 'completed', 'order'];
  protected $appends = ['order'];
  public $timestamps = false;

  public function getOrderAttribute()
  {
    return $this->position;
  }

  public function setOrderAttribute($value)
  {
      return $this->attributes['position'] = $value;
  }

}
