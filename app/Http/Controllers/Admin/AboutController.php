<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Image;
use File;
class AboutController extends Controller
{
    protected $about = null;
    public function __construct(About $about)
    {
        $this->about = $about;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutData = About::all();
        return view('admin.about.index',compact('aboutData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->about->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/about/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $about = new About();
        $about->title = $request->title;
        $about->top_description = $request->top_description;
        $about->description = $request->description;
        $about->image = $name;
        $status = $about->save();
        if($status){
            $request->session()->flash('success','About Page was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! About Page could not be added at this moment.');
        }
        return redirect()->route('about.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutDetail = About::find($id);
        return view('admin.about.show',compact('aboutDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutDetail = About::find($id);
        return view('admin.about.edit',compact('aboutDetail'));
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
        $aboutDetail = About::find($id);

        $rules = $this->about->getRules('update');
        $request->validate($rules);

        $image1 = $aboutDetail->image;
        if($request->hasFile('image')) {
            File::delete('uploads/about'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/about/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }

        $aboutDetail->title = $request->title;
        $aboutDetail->top_description = $request->top_description;
        $aboutDetail->description = $request->description;
        $aboutDetail->image = $name;
        $status = $aboutDetail->save();
        if($status){
            $request->session()->flash('success','About Page was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! About Page could not be updated at this moment.');
        }
        return redirect()->route('about.index');
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
