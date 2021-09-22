<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo("App\Models\category");
    }
    public function publisher()
    {
        return $this->belongsTo("App\Models\publisher");
    }
    public function authors()
    {
        return $this->belongsToMany("App\Models\author","book_author");
    }


    public function ratings()
    {
        return $this->hasMany("App\Models\Rating");
    }

    public function rate()
    {
        return $this->ratings->isNotEmpty() ? $this->ratings()->sum("value") / $this->ratings()->count() : 0;
    }
}
