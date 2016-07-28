<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        'word', 'description'
    ];

    protected $visible = [
    	'id', 'word', 'description'
    ];
}
