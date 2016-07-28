<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class KeywordController extends Controller
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
            $keywords = \App\Keyword::orderBy('word', 'asc')->get();
            return $keywords;
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
            return \App\Keyword::create($request->all());
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
            return \App\Keyword::find($id);
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
            $keyword = \App\Keyword::find($id);
            $keyword->description = $request->description;
            $keyword->save();
            return response()->json("{}", 200);
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
            \App\Keyword::destroy($id);
            return response()->json("{}", 200);
        }
        catch(Exception $e) 
        {
            return response()->json("{}", 500);
        }
    }
}
