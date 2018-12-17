<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Artguideline;

class ArtGuidelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all ART Guidelines
        $artguidelines = Artguideline::all();
        return $artguidelines->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artguideline = new Artguideline();
        $artguideline->title = $request->title;
        $artguideline->content = $request->content;
        $artguideline->order = $request->order;
        $artguideline->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artguideline = Artguideline::find($id);
        return $artguideline->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $artguideline = Artguideline::find($id);
        $artguideline->title = $request->title;
        $artguideline->content = $request->content;
        $artguideline->order = $request->order;
        $artguideline->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artguideline = Artguideline::find($id);
        $artguideline->delete();
    }

    public function upload(Request $request)
    {
      $uploadedFile = $request->file('file');
      $filename = $uploadedFile->getClientOriginalName();

      Storage::disk('zhcra')->putFileAs(
        'ART_Guidelines/',
        $uploadedFile,
        $filename
      );

      return response()->json([
        
      ]);
    }
}
