@extends('layouts.admin')
@section('title','Service Page | Arthafal')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://128.0.0.1:8000/arthafal/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Service Lists</h1></div>
                    <a href="{{route('service.create')}}" class="btn btn-success add-btn">
                        <i class="fa fa-plus">Add Service</i>
                    </a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th> Image</th>
                        <th> Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($serviceData))
                        @foreach($serviceData as $key=>$serviceDetail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$serviceDetail->title}}</td>
                                <td>
                                    <img src="{{asset('uploads/service/'.$serviceDetail->image)}}" alt="" class="img img-thumbnail img-responsive" width="60px;">
                                </td>
                                <td>
                                    @if($serviceDetail->enabled == 1)
                                        Show On Front <a href="{{url('arthafal/service/disable', $serviceDetail->id)}}" class="btn btn-danger btn-xs">Hide From Front</a>
                                    @else
                                        Hide From Front <a href="{{url('arthafal/service/enable', $serviceDetail->id)}}" class="btn btn-success btn-xs"> Show On Front</a>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('service.show',$serviceDetail->id)}}" class="btn btn-primary show_service" style="border-radius: 50%; margin-left:10px" data-id="{{$serviceDetail->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('service.edit',$serviceDetail->id)}}" class="btn btn-success edit_service" style="border-radius: 50%; margin-left:10px" data-id="{{$serviceDetail->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{Form::open(['url'=>route('service.destroy',$serviceDetail->id),'onsubmit'=>"return confirm('Are you sure you want to delete this service?')",'class'=>"form pull-left"])}}
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
