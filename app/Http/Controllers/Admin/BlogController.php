<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Image;
use File;
class BlogController extends Controller
{
    protected $blog = null;
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogData = Blog::orderBy('id','desc')->get();
        return view('admin.blog.index',compact('blogData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->blog->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/blog/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $blog = new Blog();
        $blog->image = $name;
        $blog->title = $request->title;
        $blog->slug = \Str::slug($request->title);
        $blog->description = $request->description;
        $blog->post_by = $request->post_by;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $status = $blog->save();
        if($status){
            $request->session()->flash('success','Blog Page was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Blog Page could not be added at this moment.');
        }
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogDetail = Blog::find($id);
        return view('admin.blog.show',compact('blogDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogDetail = Blog::find($id);
        return view('admin.blog.edit',compact('blogDetail'));
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
        $blogDetail = Blog::find($id);

        $rules = $this->blog->getRules('update');
        $request->validate($rules);

        $image1 = $blogDetail->image;
        if($request->hasFile('image')) {
            File::delete('uploads/blog'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/blog/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $blogDetail->image = $name;
        $blogDetail->title = $request->title;
        $blogDetail->slug = \Str::slug($request->title);
        $blogDetail->description = $request->description;
        $blogDetail->post_by = $request->post_by;
        $blogDetail->meta_title = $request->meta_title;
        $blogDetail->meta_keywords = $request->meta_keywords;
        $blogDetail->meta_description = $request->meta_description;
        $status = $blogDetail->save();
        if($status){
            $request->session()->flash('success','Blog Page was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Blog Page could not be updated at this moment.');
        }
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogDetail = Blog::find($id);
        $image1 = $blogDetail->image;
        $delete = $blogDetail->delete();
        if($delete){
            \File::delete('uploads/blog'.'/'.$image1);
            request()->session()->flash('success','Blog Page deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Blog Page could not be deleted at this moment.');
        }
        return redirect()->route('blog.index');
    }
}
