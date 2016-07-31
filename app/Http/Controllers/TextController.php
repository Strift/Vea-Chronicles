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
            $texts = \App\Text::with('keywords')->get();
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
            $this->validate($request, [
                "title" => 'required|unique:texts|max:255',
                "content" => 'required',
                ]);
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
            $text = \App\Text::with('keywords')->find($id);
            if (!is_null($text))
            {
                return $text->toJson();
            }
            return response()->json("{}", 500);
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
            $this->validate($request, [
                "title" => 'required|unique:texts,title,'.$id.',id|max:255',
                "content" => 'required',
                ]);
            $text = \App\Text::find($id);
            if (!is_null($text))
            {
                $text->update($request->all());
                return$text->toJson();
            }
            return response()->json("{}", 500);
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

    /*public function attachKeyword(Request $request)
    {

    }*/

}
