@extends('layouts.admin')
@section('title','Service/Plan Inquiry Page | Arthafal')

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
                    @if(isset($planinquiry))
                        @foreach($planinquiry as $key=>$inquiry)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$inquiry->plan_name}}</td>
                                <td>{{$inquiry->name}}</td>
                                <td>{{$inquiry->email}}</td>
                                <td>
                                    @if($inquiry->enabled == 1)
                                        Read <a href="{{url('arthafal/planinquiry/disable', $inquiry->id)}}" class="btn btn-danger btn-xs">Hide This</a>
                                    @else
                                        UnRead <a href="{{url('arthafal/planinquiry/enable', $inquiry->id)}}" class="btn btn-success btn-xs"> Show This</a>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('planinquiry.show',$inquiry->id)}}" class="btn btn-primary show_inquiry" style="border-radius: 50%; margin-left:10px" data-id="{{$inquiry->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    {{Form::open(['url'=>route('planinquiry.destroy',$inquiry->id),'onsubmit'=>"return confirm('Are you sure you want to delete this inquiry?')",'class'=>"form pull-left"])}}
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
