<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $texts = \App\Text::all();
            return $texts->toJson();
        }
        catch (Exception $e)
        {
            return response()->json("{}", 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            return \App\Text::create($request->all());
        }
        catch (Exception $e)
        {
            return response()->json("{}", 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $text = \App\Text::find($id);
            if (!is_null($text))
            {
                return $text->toJson();
            }
        }
        catch (Exception $e)
        {
            return response()->json("{}", 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
           $text = \App\Text::find($id);
           $text->content = $request->content;
           $text->save();
            return$text->toJson();
        } 
        catch(Exception $e) 
        {
            return response()->json("{}", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            \App\Text::destroy($id);
            return response()->json("{}", 200);
        }
        catch(Exception $e) 
        {
            return response()->json("{}", 500);
        }
    }
}
