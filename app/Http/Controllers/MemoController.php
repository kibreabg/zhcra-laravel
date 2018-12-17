<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Memo;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all Memos
        $memos = Memo::all();
        return $memos->toJson();
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
        $memo = new Memo();
        $memo->title = $request->title;
        $memo->url = $request->url;
        $memo->latest = $request->latest;
        if($memo->latest == true){
            DB::table('memos')
                ->update(['latest' => false]);
        }
        $memo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $memo = Memo::find($id);
        return $memo->toJson();
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
        $memo = Memo::find($id);
        $memo->title = $request->title;
        $memo->url = $request->url;
        $memo->latest = $request->latest;
        $memo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $memo = Memo::find($id);
        $memo->delete();
    }

    public function upload(Request $request)
    {
      $uploadedFile = $request->file('file');
      $filename = $uploadedFile->getClientOriginalName();

      Storage::disk('zhcra')->putFileAs(
        'Memos/',
        $uploadedFile,
        $filename
      );

      return response()->json([
        
      ]);
    }
}
