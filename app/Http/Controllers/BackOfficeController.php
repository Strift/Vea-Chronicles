<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BackOfficeController extends Controller
{
    public function keywords()
    {
    	return view('keywords');
    }

    public function texts()
    {
    	return view('texts');
    }
}
