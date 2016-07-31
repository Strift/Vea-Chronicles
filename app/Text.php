<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ["title", "content"];

    protected $visible = [ "id", "title", "content", "keywords"];

    public function keywords()
    {
    	return $this->belongsToMany(Keyword::class);
    }
}
