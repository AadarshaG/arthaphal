@extends('layouts.admin')
@section('title','Blog Page | EWES')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://127.0.0.1:8000/ewes/blog" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Blog </h1></div>
                    <a href="{{route('blog.edit',$blogDetail->id)}}" class="btn btn-success edit_blog" style="border-radius: 50%; margin-left:10px" data-id="{{$blogDetail->id}}">
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
                                <img src="{{ asset('uploads/blog'.'/'.$blogDetail->image) }}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $blogDetail->title }}
                        </li>

                        <li class="list-group-item">
                            <strong>Posted On</strong> : {{ \Carbon\Carbon::parse($blogDetail->post_on)->format('M d, Y') }}
                        </li>
                        <li class="list-group-item">
                            <strong>Posted By</strong> : {!! $blogDetail->post_by !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Description</strong> : {!! $blogDetail->description !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Meta Titles</strong> : {!! $blogDetail->meta_title !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Meta Keywords</strong> : {!! $blogDetail->meta_keywords !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Meta Description</strong> : {!! $blogDetail->meta_description !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $blogDetail->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $blogDetail->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                </table>
            </div>
        </div>
    </div>
@endsection
