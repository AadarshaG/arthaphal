@extends('layouts.admin')
@section('title','Inquiry Page | Arthafal')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://127.0.0.1:8000/arthafal/inquiry" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Inquiry Message</h1></div>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover">
                    <div class="col-md-6 pull-right">
                        <div class="box box-primary">
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Full Name</strong> : {{ $inquiry->full_name }}
                        </li>
                        <li class="list-group-item">
                            <strong>Email</strong> : {{ $inquiry->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>Phone No</strong> : {{ $inquiry->phone }}
                        </li>
                        <li class="list-group-item">
                            <strong>Read Status</strong> :
                            @if($inquiry->enabled == 1)
                                New <a href="{{url('arthafal/disable', $inquiry->id)}}" class="btn btn-danger btn-xs">Hide This </a>
                            @else
                                Read <a href="{{url('arthafal/enable', $inquiry->id)}}" class="btn btn-success btn-xs"> Show This </a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <strong>Inquiry Message</strong> : {!! $inquiry->message !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $inquiry->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $inquiry->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                </table>
            </div>
        </div>
    </div>
@endsection
