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
            return $keywords->toJson();
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
                "word" => 'required|unique:keywords|max:255'
                ]);
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
            $word = \App\Keyword::find($id);
            if (!is_null($word))
            {
                return $word->toJson();
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
            $this->validate($request, [
                "word" => 'required|unique:keywords,word,'.$id.',id|max:255',
                "description" => 'required',
                ]);
            $keyword = \App\Keyword::find($id);
            if (!is_null($keyword))
            {
                $keyword->update($request->all());
                return $keyword->toJson();
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
            \App\Keyword::destroy($id);
            return response()->json("{}", 200);
        }
        catch(Exception $e) 
        {
            return response()->json("{}", 500);
        }
    }
}
