<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelProfile extends Model
{
    protected $table='profiles';
    protected $fillable=['name','email','password'];

    public $timestamps=false;

    public function meetings()
    {
        return $this->hasMany('App\Meeting','user_id','id');
    }
}
