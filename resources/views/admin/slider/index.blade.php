@extends('layouts.admin')
@section('title','Banner Page | Arthafal')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://128.0.0.1:8000/arthafal/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Home Banner Lists</h1></div>
{{--                    <a href="{{route('slider.create')}}" class="btn btn-success add-btn">--}}
{{--                        <i class="fa fa-plus">Add Banner</i>--}}
{{--                    </a>--}}
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-hover" id="example">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Show On Front</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($sliderData))
                        @foreach($sliderData as $key=>$sliderDetail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$sliderDetail->title}}</td>
                                <td>
                                    <img src="{{asset('uploads/slider/'.$sliderDetail->image)}}" alt="" class="img img-thumbnail img-responsive" width="80px;">
                                </td>
                                <td>
                                    @if($sliderDetail->enabled == 1)
                                        Show On Front <a href="{{url('arthafal/disable', $sliderDetail->id)}}" class="btn btn-danger btn-xs">Hide From Front</a>
                                    @else
                                        Hide From Front <a href="{{url('arthafal/enable', $sliderDetail->id)}}" class="btn btn-success btn-xs"> Show On Front</a>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('slider.show',$sliderDetail->id)}}" class="btn btn-primary show_slider" style="border-radius: 50%; margin-left:10px" data-id="{{$sliderDetail->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('slider.edit',$sliderDetail->id)}}" class="btn btn-success edit_slider" style="border-radius: 50%; margin-left:10px" data-id="{{$sliderDetail->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{Form::open(['url'=>route('slider.destroy',$sliderDetail->id),'onsubmit'=>"return confirm('Are you sure you want to delete this slider?')",'class'=>"form pull-left"])}}
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
