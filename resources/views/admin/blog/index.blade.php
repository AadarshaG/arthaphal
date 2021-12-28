@extends('layouts.admin')
@section('title','Blog Page | Arthafal')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://128.0.0.1:8000/arthafal/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Blog Lists</h1></div>
                    <a href="{{route('blog.create')}}" class="btn btn-success add-btn">
                        <i class="fa fa-plus">Add Blog</i>
                    </a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Posted On</th>
                        <th>Posted By</th>
                        <th> Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($blogData))
                        @foreach($blogData as $key=>$blogDetail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$blogDetail->title}}</td>
                                <td>{{$blogDetail->created_at}}</td>
                                <td>{{$blogDetail->post_by}}</td>
                                <td>
                                    <img src="{{asset('uploads/blog/'.$blogDetail->image)}}" alt="" class="img img-thumbnail img-responsive" width="60px;">
                                </td>
                                <td>
                                    <a href="{{route('blog.show',$blogDetail->id)}}" class="btn btn-primary show_blog" style="border-radius: 50%; margin-left:10px" data-id="{{$blogDetail->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('blog.edit',$blogDetail->id)}}" class="btn btn-success edit_blog" style="border-radius: 50%; margin-left:10px" data-id="{{$blogDetail->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{Form::open(['url'=>route('blog.destroy',$blogDetail->id),'onsubmit'=>"return confirm('Are you sure you want to delete this blog?')",'class'=>"form pull-left"])}}
                                    @method('delete')
                                    {{Form::button('<i class="fa fa-trash"></i>',['class'=>'btn btn-danger','style'=>'border-radius: 50%','type'=>'submit'])}}
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
