@extends('layouts.admin')
@section('title','Document PDF | Arthafal')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://127.0.0.1:8000/arthafal/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Document PDF</h1></div>
                    <a href="{{route('document.create')}}" class="btn btn-success add-btn">
                        <i class="fa fa-plus">Add PDF</i>
                    </a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th> Category</th>
                        <th> Title</th>
                        <th>PDF</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($documents))
                        @foreach($documents as $key=>$docs)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$docs->category['title']}}</td>
                                <td>{{$docs->title}}</td>
                                <td>{{$docs->pdf}}
                                <td>
                                    <a href="{{route('document.edit',$docs->id)}}" class="btn btn-success edit_document" style="border-radius: 50%; margin-left:10px" data-id="{{$docs->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{Form::open(['url'=>route('document.destroy',$docs->id),'onsubmit'=>"return confirm('Are you sure you want to delete this document?')",'class'=>"form pull-left"])}}
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
