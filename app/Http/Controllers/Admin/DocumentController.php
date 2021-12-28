<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Image;
use File;

class DocumentController extends Controller
{
    protected $category = null;
    protected $document = null;
    public function __construct(Category $category,Document $document)
    {
        $this->category = $category;
        $this->document = $document;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = $this->document->getAll();
        return view('admin.category.document.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->category->orderBy('id','asc')->pluck('title','id');
        return view('admin.category.document.form',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->document->getRules();
        $request->validate($rules);

        if($request->hasFile('pdf')){
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/document/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= '';
        }
        $document = new Document();
        $document->category_id = $request->category_id;
        $document->title = $request->title;
        $document->pdf = $files1;
        $status = $document->save();
        if($status){
            $request->session()->flash('success','Document PDF was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Document PDF could not be added at this moment.');
        }
        return redirect()->route('document.index');
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
        $document = Document::find($id);
        $category = $this->category->orderBy('id','asc')->pluck('title','id');
        return view('admin.category.document.form',compact('category','document'));
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
        $document = Document::find($id);

        $rules = $this->servicepdf->getRules('update');
        $request->validate($rules);

        $pdf = $document->pdf;
        if($request->hasFile('pdf')){
            File::delete('uploads/document'.'/'.$pdf);
            $file1 = $request->file('pdf');
            $destinationPath = 'uploads/document/';
            $files1 = $file1->getClientOriginalName();
            $fileName1 = $files1;
            $file1->move($destinationPath, $fileName1);
        }
        else
        {
            $files1= $pdf;
        }
        $document->title = $request->title;
        $document->pdf = $files1;
        $status = $document->save();
        if($status){
            $request->session()->flash('success','Document PDF was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Document PDF could not be updated at this moment.');
        }
        return redirect()->route('document.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);
        $pdf = $document->pdf;
        $status = $document->delete();
        if($status){
            \File::delete('uploads/document'.'/'.$pdf);
            request()->session()->flash('success',' Document PDF deleted successfully');
        }else{
            request()->session()->flash('error','Sorry!  Document PDF could not be deleted at this moment.');
        }
        return redirect()->route('document.index');
    }
}
