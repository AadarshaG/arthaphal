<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;
use File;
use Str;

class ProductController extends Controller
{
    protected $product = null;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->product->getRules();
        $request->validate($rules);

        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/product/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $product = new Product();
        $product->title = $request->title;
        $product->slug = \Str::slug($request->title);
        $product->description = $request->description;
        $product->meta_title = $request->meta_title;
        $product->meta_keywords = $request->meta_keywords;
        $product->meta_description = $request->meta_description;
        $product->image = $name;
        $status = $product->save();
        if($status){
            $request->session()->flash('success','Plan Page was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Plan Page could not be added at this moment.');
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
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
        $product = Product::find($id);

        $rules = $this->product->getRules('update');
        $request->validate($rules);

        $image1 = $product->image;
        if($request->hasFile('image')) {
            File::delete('uploads/product'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/product/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $product->title = $request->title;
        $product->slug = \Str::slug($request->title);
        $product->description = $request->description;
        $product->meta_title = $request->meta_title;
        $product->meta_keywords = $request->meta_keywords;
        $product->meta_description = $request->meta_description;
        $product->image = $name;
        $status = $product->save();
        if($status){
            $request->session()->flash('success','Plan Page was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Plan Page could not be updated at this moment.');
        }
        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $image1 = $product->image;
        $delete = $product->delete();
        if($delete){
            \File::delete('uploads/product'.'/'.$image1);
            request()->session()->flash('success','Plan Page deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Plan Page could not be deleted at this moment.');
        }
        return redirect()->route('product.index');
    }

    public function enableProduct($id)
    {
        $product = Product::find($id);
        $product->enabled = 1;
        $product->save();
        return redirect()->back()->with('success', 'Plan Enabled Successfully');
    }

    public function disableProduct($id)
    {
        $product = Product::find($id);
        $product->enabled = 0;
        $product->save();
        return redirect()->back()->with('success', 'Plan Disabled Successfully');
    }
}
