@extends('layouts.admin')
@section('title','Policy Page | EWES')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://128.0.0.1:8000/ewes/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Policy </h1></div>
                    <a href="{{route('policy.create')}}" class="btn btn-success add-btn">
                        <i class="fa fa-plus">Add Policy</i>
                    </a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($policyData))
                        @foreach($policyData as $key=>$policyDetail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$policyDetail->title}}</td>
                                <td>
                                    <a href="{{route('policy.show',$policyDetail->id)}}" class="btn btn-primary show_policy" style="border-radius: 50%; margin-left:10px" data-id="{{$policyDetail->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
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
