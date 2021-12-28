<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Planinquiry;
use Illuminate\Http\Request;

class PlaninquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planinquiry = Planinquiry::select('*')->latest()->get();
        return view('admin.planinquiry.index',compact('planinquiry'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planinquiry = Planinquiry::find($id);
        return view('admin.planinquiry.show',compact('planinquiry'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planinquiry = Planinquiry::find($id);
        $status = $planinquiry->delete();
        if($status){
            request()->session()->flash('success','Inquiry Message deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Inquiry Message could not be deleted at this moment.');
        }
        return redirect()->route('planinquiry.index');
    }
    public function enablePlaninquiry($id)
    {
        $planinquiry = Planinquiry::find($id);
        $planinquiry->enabled = 1;
        $planinquiry->save();
        return redirect()->back()->with('success', 'Planinquiry  Message Has Been Read');
    }

    public function disablePlaninquiry($id)
    {
        $planinquiry = Planinquiry::find($id);
        $planinquiry->enabled = 0;
        $planinquiry->save();
        return redirect()->back()->with('success', 'Planinquiry Message Has Not Been Read');
    }
}
