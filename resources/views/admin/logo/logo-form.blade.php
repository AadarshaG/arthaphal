@extends('layouts.admin')
@section('title','Add Logo Page | Arthafal')

@section('main-content')
    @if(isset($logoDetail))
        {{Form::open(['url'=>route('logo.update',$logoDetail->id), 'files'=>true, 'class'=>'form'])}}
        @method('patch')
    @else
        {{Form::open(['url'=>route('logo.store'), 'files'=>true, 'class'=>'form'])}}
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;" >
                    <div class="ibox-title" style="color: #ffffff;"><h1>{{isset($logoDetail) ? 'Update' : 'Add'}} Logo</h1></div>
                    <a href="http://127.0.0.1:8000/arthafal/logo" class="btn btn-secondary pull-right" id="close"><i class="fa fa-times"> </i> close</a>
                </div>

                <div class="ibox-body">
                    <div class="form-group row">
                        {{Form::label('title','Logo Title :',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::text('title',@$logoDetail->title,['class'=>'form-control form-control-md','id'=>'title','required'=>true,'placeholder'=>'Enter Logo Title........'])}}
                            @error('title')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('image','Image * :',['class'=>'col-md-3'])}}
                        <div class="col-md-5">
                            {{Form::file('image',['id'=>'image','accept'=>'image/*'])}}
                            @error('image')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        @if(isset($logoDetail))
                            <div class="col-md-4">
                                <img src="{{asset('uploads/logo/'.$logoDetail->image)}}" alt="" class="img img-responsive img-thumbnail" width="100px;">
                            </div>
                        @endif
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
