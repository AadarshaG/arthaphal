@extends('layouts.admin')
@section('title','Plan Page | Arthafal')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

@section('main-content')
    <a href="http://128.0.0.1:8000/arthafal/back-end" class="btn btn-secondary" id="close" style="margin-bottom:23px;"><i class="fa fa-times"> </i> close</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head" style="background: #253544; gradient(left, #1c65a9 0%, #5a5c5c 100%) !important; border-radius: 10px;">
                    <div class="ibox-title" style="color: #ffffff;"><h1>Plan Lists</h1></div>
                    <a href="{{route('product.create')}}" class="btn btn-success add-btn">
                        <i class="fa fa-plus">Add Plan</i>
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
                    @if(isset($products))
                        @foreach($products as $key=>$productDetail)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$productDetail->title}}</td>
                                <td>
                                    <img src="{{asset('uploads/product/'.$productDetail->image)}}" alt="" class="img img-thumbnail img-responsive" width="60px;">
                                </td>
                                <td>
                                    @if($productDetail->enabled == 1)
                                        Show On Front <a href="{{url('arthafal/product/disable', $productDetail->id)}}" class="btn btn-danger btn-xs">Hide From Front</a>
                                    @else
                                        Hide From Front <a href="{{url('arthafal/product/enable', $productDetail->id)}}" class="btn btn-success btn-xs"> Show On Front</a>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('product.show',$productDetail->id)}}" class="btn btn-primary show_product" style="border-radius: 50%; margin-left:10px" data-id="{{$productDetail->id}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    {{Form::open(['url'=>route('product.destroy',$productDetail->id),'onsubmit'=>"return confirm('Are you sure you want to delete this product?')",'class'=>"form pull-left"])}}
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
