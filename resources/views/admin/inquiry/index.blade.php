@extends('layouts.admin')
@section('title','Inquiry Page | Arthafal')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://128.0.0.1:8000/arthafal/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Inquiry Lists</h1></div>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($inquiry))
                        @foreach($inquiry as $key=>$inq)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$inq->full_name}}</td>
                                <td>{{$inq->email}}</td>
                                <td>
                                    @if($inq->enabled == 1)
                                        Read <a href="{{url('arthafal/inquiry/disable', $inq->id)}}" class="btn btn-danger btn-xs">Hide From Front</a>
                                    @else
                                        UnRead <a href="{{url('arthafal/inquiry/enable', $inq->id)}}" class="btn btn-success btn-xs"> Show On Front</a>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('inquiry.show',$inq->id)}}" class="btn btn-primary show_inquiry" style="border-radius: 50%; margin-left:10px" data-id="{{$inq->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    {{Form::open(['url'=>route('inquiry.destroy',$inq->id),'onsubmit'=>"return confirm('Are you sure you want to delete this inquiry?')",'class'=>"form pull-left"])}}
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
