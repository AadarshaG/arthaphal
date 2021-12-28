<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Planpdf;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;
use File;
use Str;
class PlanpdfController extends Controller
{
    protected $product = null;
    protected $planpdf = null;
    public function __construct(Product $product, Planpdf $planpdf)
    {
        $this->product = $product;
        $this->planpdf = $planpdf;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planpdf = $this->planpdf->getAll();
        return view('admin.product.plan.index',compact('planpdf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->product->orderBy('id','asc')->pluck('title','id');
        return view('admin.product.plan.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->planpdf->getRules();
        $request->validate($rules);

        if($request->hasFile('pdf')){
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/planpdf/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= '';
        }
        $planpdf = new Planpdf();
        $planpdf->product_id = $request->product_id;
        $planpdf->title = $request->title;
        $planpdf->pdf = $files1;
        $status = $planpdf->save();
        if($status){
            $request->session()->flash('success','Plan Related PDF was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Plan Related PDF could not be added at this moment.');
        }
        return redirect()->route('planpdf.index');

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
        $planpdf = Planpdf::find($id);
        $products = $this->product->orderBy('id','asc')->pluck('title','id');
        return view('admin.product.plan.create',compact('products','planpdf'));
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
        $planpdf = Planpdf::find($id);

        $rules = $this->planpdf->getRules('update');
        $request->validate($rules);

        $pdf = $planpdf->pdf;
        if($request->hasFile('pdf')){
            File::delete('uploads/planpdf'.'/'.$pdf);
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/planpdf/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= $pdf;
        }
        $planpdf->title = $request->title;
        $planpdf->pdf = $files1;
        $status = $planpdf->save();
        if($status){
            $request->session()->flash('success','Plan Related PDF was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Plan Related PDF could not be updated at this moment.');
        }
        return redirect()->route('planpdf.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planpdf = Planpdf::find($id);
        $pdf = $planpdf->pdf;
        $status = $planpdf->delete();
        if($status){
            \File::delete('uploads/planpdf'.'/'.$pdf);
            request()->session()->flash('success','Plan Document PDF deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Plan Document PDF could not be deleted at this moment.');
        }
        return redirect()->route('planpdf.index');
    }
}
