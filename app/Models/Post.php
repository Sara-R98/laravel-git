<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    // protected $table='posts';
    // protected $primarykey='id' ;
    public $directory=' /images/';
    protected $date = ['deleted_at']; 
    protected $fillable=['title', 'content'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function photos(){
      return $this->morphMany(photo::class , 'imageable');
    }

    public function tags(){
      return $this->morphToMany(Tag::class , 'taggable');
  }

  //accessor
  public function getTitleAttribute($value){
    // return ucfirst($value);
    return strtoupper($value);
  }
  //mutator
  public function setTitleAttribute($value){
    $this->attributes['title']=strtoupper($value);
  }

  public function getPathAttribute($value){
    return $this->directory . $value;
  }
}
