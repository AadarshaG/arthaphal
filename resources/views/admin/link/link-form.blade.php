@extends('layouts.admin')
@section('title','Add Link Page | Arthafal')

@section('main-content')
    @if(isset($linkDetail))
        {{Form::open(['url'=>route('link.update',$linkDetail->id), 'files'=>true, 'class'=>'form'])}}
        @method('patch')
    @else
        {{Form::open(['url'=>route('link.store'), 'files'=>true, 'class'=>'form'])}}
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;" >
                    <div class="ibox-title" style="color: #ffffff;"><h1>{{isset($linkDetail) ? 'Update' : 'Add'}} Link</h1></div>
                    <a href="http://127.0.0.1:8000/arthafal/link" class="btn btn-secondary pull-right" id="close"><i class="fa fa-times"> </i> close</a>
                </div>

                <div class="ibox-body">
                    <div class="form-group row">
                        {{Form::label('title',' Icon Name :',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::text('title',@$linkDetail->title,['class'=>'form-control form-control-md','id'=>'title','required'=>false,'placeholder'=>'Enter Social Icon Name........'])}}
                            @error('title')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('icon','Image * :',['class'=>'col-md-3'])}}
                        <div class="col-md-5">
                            {{Form::file('icon',['id'=>'icon','accept'=>'icon/*'])}}
                            @error('icon')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        @if(isset($aboutDetail))
                            <div class="col-md-4">
                                <img src="{{asset('uploads/link/'.$linkDetail->icon)}}" alt="" class="img img-responsive img-thumbnail">
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        {{Form::label('link','Social URL :',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::text('link',@$linkDetail->link,['class'=>'form-control form-control-md','id'=>'link','required'=>true,'placeholder'=>'Enter Social Media URL........'])}}
                            @error('link')
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
    {{Form::close()}}
@endsection
