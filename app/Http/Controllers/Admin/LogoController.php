<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use Image;
use File;
class LogoController extends Controller
{
    protected $logo = null;
    public function __construct(Logo $logo)
    {
        $this->logo = $logo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logoData = Logo::all();
        return view('admin.logo.logo',compact('logoData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logo.logo-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->logo->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/logo/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $logo = new Logo();
        $logo->title = $request->title;
        $logo->image = $name;
        $status = $logo->save();
        if($status){
            $request->session()->flash('success','Logo Image was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Logo Image could not be added at this moment.');
        }
        return redirect()->route('logo.index');
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
        $logoDetail = Logo::find($id);
        return view('admin.logo.logo-form',compact('logoDetail'));
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
        $logoDetail = Logo::find($id);

        $rules = $this->logo->getRules('update');
        $request->validate($rules);

        $image = $logoDetail->image;
        if($request->hasFile('image')) {
            File::delete('uploads/logo'.'/'.$image);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/logo/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image;
        }

        $logoDetail->title = $request->title;
        $logoDetail->image = $name;
        $status = $logoDetail->save();
        if($status){
            $request->session()->flash('success','Logo Image was Updated successfully.');
        }else{
            $request->session()->flash('error','Sorry! Logo Image could not be updated at this moment.');
        }
        return redirect()->route('logo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
