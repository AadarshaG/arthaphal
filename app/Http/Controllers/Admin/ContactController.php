<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Image;
use File;
class ContactController extends Controller
{
    protected $contact = null;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactData = Contact::all();
        return view('admin.contact.index',compact('contactData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->contact->getRules();
        $request->validate($rules);

        $contact = new Contact();
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->mail = $request->mail;
        $contact->iframe = $request->iframe;
        $status = $contact->save();
        if($status){
            $request->session()->flash('success','Contact Info was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Contact Info could not be added at this moment.');
        }
        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactDetail = Contact::find($id);
        return view('admin.contact.show',compact('contactDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactDetail = Contact::find($id);
        return view('admin.contact.edit',compact('contactDetail'));
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
        $contactDetail = Contact::find($id);

        $rules = $this->contact->getRules('update');
        $request->validate($rules);

        $contactDetail->address = $request->address;
        $contactDetail->phone = $request->phone;
        $contactDetail->mail = $request->mail;
        $contactDetail->iframe = $request->iframe;
        $status = $contactDetail->save();
        if($status){
            $request->session()->flash('success','Contact Info was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Contact Info could not be updated at this moment.');
        }
        return redirect()->route('contact.index');
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
