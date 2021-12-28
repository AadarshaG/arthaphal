<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Servicepdf;
use Illuminate\Http\Request;
use File;
use Image;
class ServicepdfController extends Controller
{
    protected $servicepdf = null;
    public function __construct(Servicepdf $servicepdf,Service $service)
    {
        $this->servicepdf = $servicepdf;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicepdf = $this->servicepdf->getAll();
        return view('admin.service.servicepdf.index',compact('servicepdf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = $this->service->orderBy('id','asc')->pluck('title','id');
        return view('admin.service.servicepdf.create',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->servicepdf->getRules();
        $request->validate($rules);

        if($request->hasFile('pdf')){
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/servicepdf/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= '';
        }
        $servicepdf = new Servicepdf();
        $servicepdf->service_id = $request->service_id;
        $servicepdf->title = $request->title;
        $servicepdf->pdf = $files1;
        $status = $servicepdf->save();
        if($status){
            $request->session()->flash('success','Service Related PDF was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Service Related PDF could not be added at this moment.');
        }
        return redirect()->route('servicepdf.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicepdf = Servicepdf::find($id);
        $service = $this->service->orderBy('id','asc')->pluck('title','id');
        return view('admin.service.servicepdf.create',compact('servicepdf','service'));
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
        $servicepdf = Servicepdf::find($id);

        $rules = $this->servicepdf->getRules('update');
        $request->validate($rules);

        $pdf = $servicepdf->pdf;
        if($request->hasFile('pdf')){
            File::delete('uploads/servicepdf'.'/'.$pdf);
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/servicepdf/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= $pdf;
        }
        $servicepdf->title = $request->title;
        $servicepdf->pdf = $files1;
        $status = $servicepdf->save();
        if($status){
            $request->session()->flash('success','Service Related PDF was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Service Related PDF could not be updated at this moment.');
        }
        return redirect()->route('servicepdf.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicepdf = Servicepdf::find($id);
        $pdf = $servicepdf->pdf;
        $status = $servicepdf->delete();
        if($status){
            \File::delete('uploads/servicepdf'.'/'.$pdf);
            request()->session()->flash('success','Service Document PDF deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Service Document PDF could not be deleted at this moment.');
        }
        return redirect()->route('servicepdf.index');
    }
}
