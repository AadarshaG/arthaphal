@extends('layouts.admin')
@section('title','About Page | Arthafal')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://127.0.0.1:8000/arthafal/about" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>About Us</h1></div>
                    <a href="{{route('about.edit',$aboutDetail->id)}}" class="btn btn-success edit_about" style="border-radius: 50%; margin-left:10px" data-id="{{$aboutDetail->id}}">
                        <i class="fa fa-edit"></i>
                        Edit
                    </a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover">
                <div class="col-md-6 pull-right">
                    <div class="box box-primary">
                        <div class="box-header">
                           <h4> Image</h4>
                        </div>
                        <div class="box-body">
                            <img src="{{ asset('uploads/about'.'/'.$aboutDetail->image) }}" width="100%">
                        </div>
                    </div>
                </div>

                <ul class="list-group col-md-6">
                    <li class="list-group-item">
                        <strong>Title</strong> : {{ $aboutDetail->title }}
                    </li>

                    <li class="list-group-item">
                        <strong>Top Description</strong> : {!! $aboutDetail->top_description  !!}
                    </li>
                    <li class="list-group-item">
                        <strong>Description</strong> : {!! $aboutDetail->description !!}
                    </li>
                    <li class="list-group-item">
                        <strong>Created</strong> : {{ $aboutDetail->created_at->diffForHumans() }}
                    </li>
                    <li class="list-group-item">
                        <strong>Updated</strong> : {{ $aboutDetail->updated_at->diffForHumans() }}
                    </li>
                </ul>
                </table>
            </div>
        </div>
    </div>
@endsection
