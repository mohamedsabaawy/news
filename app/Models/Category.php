<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['name','master_id','user_id'];

//    public function getMasterIdAttribute($value)
//    {
//        $name =Category::where('id',$value)->first();
//        if ($name){
//           return $name->name;
//        }
//    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
