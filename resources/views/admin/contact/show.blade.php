@extends('layouts.admin')
@section('title','Contact Info Page | Arthafal')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://127.0.0.1:8000/arthafal/contact" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1> Contact Info</h1></div>
                    <a href="{{route('contact.edit',$contactDetail->id)}}" class="btn btn-success edit_contact" style="border-radius: 50%; margin-left:10px" data-id="{{$contactDetail->id}}">
                        <i class="fa fa-edit"></i>
                        Edit
                    </a>
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
                            <strong>Address</strong> : {{ $contactDetail->address }}
                        </li>
                        <li class="list-group-item">
                            <strong>Phone</strong> : {!! $contactDetail->phone  !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Email</strong> : {!! $contactDetail->mail !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Iframe Address</strong> : {!! $contactDetail->iframe !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $contactDetail->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $contactDetail->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                </table>
            </div>
        </div>
    </div>
@endsection
