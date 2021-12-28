@extends('layouts.admin')
@section('title','Add Contact Info Page | Arthafal')
@section('styles')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
@endsection

@section('main-content')
    {{Form::open(['url'=>route('contact.store'), 'files'=>true, 'class'=>'form'])}}
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;" >
                    <div class="ibox-title" style="color: #ffffff;"><h1>{{isset($contactDetail) ? 'Update' : 'Add'}} Contact Info</h1></div>
                    <a href="http://127.0.0.1:8000/arthafal/contact" class="btn btn-secondary pull-right" id="close"><i class="fa fa-times"> </i> close</a>
                </div>

                <div class="ibox-body">
                    <div class="form-group row">
                        {{Form::label('address','Address :',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::text('address',@$contactDetail->address,['class'=>'form-control form-control-md','id'=>'address','required'=>true,'placeholder'=>'Enter Address........'])}}
                            @error('address')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('phone','Phone Number :',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::text('phone',@$contactDetail->phone,['class'=>'form-control form-control-md','id'=>'phone','required'=>false,'placeholder'=>'Enter Phone Number........'])}}
                            @error('phone')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {{Form::label('mail','Mail :',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::text('mail',@$contactDetail->mail,['class'=>'form-control form-control-md','id'=>'mail','required'=>false,'placeholder'=>'Enter Email Address........'])}}
                            @error('mail')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('iframe','Iframe Address :',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::text('iframe',@$contactDetail->iframe,['class'=>'form-control form-control-md','id'=>'iframe','required'=>false,'placeholder'=>'Enter Iframe Address........'])}}
                            @error('iframe')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        {{Form::label('','',['class'=>'col-md-3'])}}
        <div class="col-md-9">
            {{Form::button("<i class='fa fa-paper-plane'></i> Submit",['class'=>'btn btn-success','type'=>'submit'])}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label for=""></label>
        </div>
        <div class="col-md-9">*Required Image of jpg,jpeg,png,svg,gif</div>
    </div>
    {{Form::close()}}
@endsection
