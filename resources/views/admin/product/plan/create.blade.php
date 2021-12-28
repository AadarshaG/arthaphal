@extends('layouts.admin')
@section('title','Plan Document | Arthafal')
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
    @if(isset($planpdf))
        {{Form::open(['url'=>route('planpdf.update',$planpdf->id), 'files'=>true, 'class'=>'form'])}}
        @method('patch')
    @else
        {{Form::open(['url'=>route('planpdf.store'), 'files'=>true, 'class'=>'form'])}}
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;" >
                    <div class="ibox-title" style="color: #ffffff;"><h1>{{isset($planpdf) ? 'Update' : 'Add'}} PDF</h1></div>
                    <a href="http://127.0.0.1:8000/arthafal/planpdf" class="btn btn-secondary pull-right" id="close"><i class="fa fa-times"> </i> close</a>
                </div>

                <div class="ibox-body">
                    <div class="form-group row">
                        {{Form::label('product_id','Plan Name :',['class'=>'col-md-3'])}}
                        <div class="col-md-6">
                            {{Form::select('product_id',@$products,@$planpdf->product_id,['class'=>'form-control form-control-md','id'=>'product_id','required'=>false])}}
                            @error('product_id')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('title','PDF Name:',['class'=>'col-md-3'])}}
                        <div class="col-md-9">
                            {{Form::text('title',@$planpdf->title,['class'=>'form-control form-control-md','id'=>'title','required'=>true,'placeholder'=>'Enter PDF Title........'])}}
                            @error('title')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('pdf','Detail In PDF * :',['class'=>'col-md-3'])}}
                        <div class="col-md-5">
                            {{Form::file('pdf',['id'=>'pdf','accept'=>'pdf/*'])}}
                            @error('pdf')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        @if(isset($planpdf))
                            <div class="col-md-4">
                                <span>{{$planpdf->pdf}}</span>
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
    {{Form::close()}}
@endsection
