<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Guideline;

class GuidelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all Guidelines
        $guidelines = Guideline::all();
        return $guidelines->toJson();
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
        $guideline = new Guideline();
        $guideline->title = $request->title;
        $guideline->content = $request->content;
        $guideline->order = $request->order;
        $guideline->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guideline = Guideline::find($id);
        return $guideline->toJson();
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
        $guideline = Guideline::find($id);
        $guideline->title = $request->title;
        $guideline->content = $request->content;
        $guideline->order = $request->order;
        $guideline->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guideline = Guideline::find($id);
        $guideline->delete();
    }

    public function upload(Request $request)
    {
      $uploadedFile = $request->file('file');
      $filename = $uploadedFile->getClientOriginalName();

      Storage::disk('zhcra')->putFileAs(
        'Guidelines/',
        $uploadedFile,
        $filename
      );

      return response()->json([
        
      ]);
    }
}
