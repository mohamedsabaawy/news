<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Post extends Model
{
    use LogsActivity, HasTrixRichText;
    protected $guarded = [];
    protected $fillable =['title','details','cover','category_id','post-trixFields'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopePost($query)
    {

    }
}
