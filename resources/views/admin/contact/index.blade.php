@extends('layouts.admin')
@section('title','Contact Info Page | Arthafal')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://128.0.0.1:8000/arthafal/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1> Contact Info</h1></div>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($contactData))
                        @foreach($contactData as $key=>$contactDetail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$contactDetail->address}}</td>
                                <td>{{$contactDetail->phone}}</td>
                                <td>{{$contactDetail->mail}}</td>
                                <td>
                                    <a href="{{route('contact.show',$contactDetail->id)}}" class="btn btn-primary show_contact" style="border-radius: 50%; margin-left:10px" data-id="{{$contactDetail->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('contact.edit',$contactDetail->id)}}" class="btn btn-success edit_contact" style="border-radius: 50%; margin-left:10px" data-id="{{$contactDetail->id}}">
                                        <i class="fa fa-edit"></i>
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
