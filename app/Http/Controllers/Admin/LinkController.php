<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Image;
use File;
class LinkController extends Controller
{
    protected $link = null;
    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linkData = Link::all();
        return view('admin.link.link',compact('linkData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.link-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->link->getRules();
        $request->validate($rules);

        if($request->hasFile('icon')) {
            $image              = $request->file('icon');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/link/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $link = new Link();
        $link->title = $request->title;
        $link->link = $request->link;
        $link->icon = $name;
        $status = $link->save();
        if($status){
            $request->session()->flash('success','Social Media Link was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Social Media Link could not be added at this moment.');
        }
        return redirect()->route('link.index');
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
        $linkDetail = Link::find($id);
        return view('admin.link.link-form',compact('linkDetail'));
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
        $link = $this->link->find($id);
        if(!$this->link){
            request()->session()->flash('error','Social Media Link does not exists.');
            return redirect()->route('link.index');
        }

        $rules = $link->getRules('update');
        $request->validate($rules);

        $image1 = $link->icon;
        if($request->hasFile('icon')) {
            File::delete('uploads/link'.'/'.$image1);
            $image             = $request->file('icon');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/link/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }

        $link->title = $request->title;
        $link->link = $request->link;
        $link->image = $name;
        $status = $link->save();
        if($status){
            $request->session()->flash('success','Social Media Link was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Social Media Link could not be updated at this moment.');
        }
        return redirect()->route('link.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = $this->link->find($id);
        if(!$this->link){
            request()->session()->flash('error','Social Media Link does not exists.');
            return redirect()->route('link.index');
        }
        $img = $link->icon;
        $delete = $link->delete();
        if($delete){
            \File::delete('uploads/link/'.$img);
            request()->session()->flash('success','Social Media Link deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Social Media Link could not be deleted at this moment.');
        }
        return redirect()->route('link.index');
    }
}
