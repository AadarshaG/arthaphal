<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Image;
use File;
class ServiceController extends Controller
{
    protected $service = null;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceData = Service::orderBy('id','desc')->get();
        return view('admin.service.index',compact('serviceData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->service->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/service/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $service = new Service();
        $service->title = $request->title;
        $service->slug = \Str::slug($request->title);
        $service->description = $request->description;
        $service->meta_title = $request->meta_title;
        $service->meta_keywords = $request->meta_keywords;
        $service->meta_description = $request->meta_description;
        $service->image = $name;
        $status = $service->save();
        if($status){
            $request->session()->flash('success','Service Page was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Service Page could not be added at this moment.');
        }
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceDetail = Service::find($id);
        return view('admin.service.show',compact('serviceDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceDetail = Service::find($id);
        return view('admin.service.edit',compact('serviceDetail'));
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
        $serviceDetail = Service::find($id);

        $rules = $this->service->getRules('update');
        $request->validate($rules);

        $image1 = $serviceDetail->image;
        if($request->hasFile('image')) {
            File::delete('uploads/service'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/service/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $serviceDetail->title = $request->title;
        $serviceDetail->slug = \Str::slug($request->title);
        $serviceDetail->description = $request->description;
        $serviceDetail->meta_title = $request->meta_title;
        $serviceDetail->meta_keywords = $request->meta_keywords;
        $serviceDetail->meta_description = $request->meta_description;
        $serviceDetail->image = $name;
        $status = $serviceDetail->save();
        if($status){
            $request->session()->flash('success','Service Page was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Service Page could not be updated at this moment.');
        }
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceDetail = Service::find($id);
        $image1 = $serviceDetail->image;
        $delete = $serviceDetail->delete();
        if($delete){
            \File::delete('uploads/service'.'/'.$image1);
            request()->session()->flash('success','Service Page deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Service Page could not be deleted at this moment.');
        }
        return redirect()->route('service.index');
    }

    public function enableService($id)
    {
        $serviceDetail = Service::find($id);
        $serviceDetail->enabled = 1;
        $serviceDetail->save();
        return redirect()->back()->with('success', 'Service Enabled Successfully');
    }

    public function disableService($id)
    {
        $serviceDetail = Service::find($id);
        $serviceDetail->enabled = 0;
        $serviceDetail->save();
        return redirect()->back()->with('success', 'Service Disabled Successfully');
    }
}
