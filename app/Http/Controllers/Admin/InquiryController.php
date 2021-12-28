<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inquiry = Inquiry::select('*')->latest()->get();
        return view('admin.inquiry.index',compact('inquiry'));
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
        $inquiry = Inquiry::find($id);
        return view('admin.inquiry.show',compact('inquiry'));
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
        $inquiry = Inquiry::find($id);
        $status = $inquiry->delete();
        if($status){
            request()->session()->flash('success','Inquiry Message deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Inquiry Message could not be deleted at this moment.');
        }
        return redirect()->route('inquiry.index');
    }

    public function enableInquiry($id)
    {
        $inquiry = Inquiry::find($id);
        $inquiry->enabled = 1;
        $inquiry->save();
        return redirect()->back()->with('success', 'Inquiry  Message Has Been Read');
    }

    public function disableInquiry($id)
    {
        $inquiry = Inquiry::find($id);
        $inquiry->enabled = 0;
        $inquiry->save();
        return redirect()->back()->with('success', 'Inquiry Message Has Not Been Read');
    }
}
