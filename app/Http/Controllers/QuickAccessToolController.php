<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Quickaccesstool;

class QuickAccessToolController extends Controller
{
    public function __construct()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all Quick Access Tools
        $quickAccessTools = Quickaccesstool::all();
        return $quickAccessTools->toJson();
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
        $quickAccessTool = new Quickaccesstool();
        $quickAccessTool->title = $request->title;
        $quickAccessTool->content = $request->content;
        $quickAccessTool->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quickAccessTool = Quickaccesstool::find($id);
        return $quickAccessTool->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $quickAccessTool = Quickaccesstool::find($id);
        $quickAccessTool->title = $request->title;
        $quickAccessTool->content = $request->content;
        $quickAccessTool->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quickAccessTool = Quickaccesstool::find($id);
        $quickAccessTool->delete();
    }

    public function upload(Request $request)
    {
      $uploadedFile = $request->file('file');
      $filename = $uploadedFile->getClientOriginalName();

      Storage::disk('zhcra')->putFileAs(
        'Quick_Access_Tools/',
        $uploadedFile,
        $filename
      );

      return response()->json([
        
      ]);
    }
}
