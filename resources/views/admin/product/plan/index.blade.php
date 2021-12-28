@extends('layouts.admin')
@section('title','Plan PDF | Arthafal')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://127.0.0.1:8000/arthafal/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Plan PDF</h1></div>
                    <a href="{{route('planpdf.create')}}" class="btn btn-success add-btn">
                        <i class="fa fa-plus">Add PDF</i>
                    </a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th> Plan</th>
                        <th> Title</th>
                        <th>PDF</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($planpdf))
                        @foreach($planpdf as $key=>$servicepd)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$servicepd->product['title']}}</td>
                                <td>{{$servicepd->title}}</td>
                                <td>{{$servicepd->pdf}}
                                <td>
                                    <a href="{{route('planpdf.edit',$servicepd->id)}}" class="btn btn-success edit_planpdf" style="border-radius: 50%; margin-left:10px" data-id="{{$servicepd->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{Form::open(['url'=>route('planpdf.destroy',$servicepd->id),'onsubmit'=>"return confirm('Are you sure you want to delete this planpdf?')",'class'=>"form pull-left"])}}
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
