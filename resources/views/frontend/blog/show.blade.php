@extends('frontend.layouts.master')

@section('main-content')
    <!-- Single Blog -->
    <section class="">
        <div class="green-bg">
            <div class="container p-3 p-md-5">
                <div class="text-start text-white ">
                    <h3 class=" border-top border-dark border-5 col-8 col-md-6  fw-bold pt-2 ">{{$blog->title}}</h3>
                    <h6><a href="{{url('blogs')}}" class="link-light">Blog</a>/ <a href="" class="link-light">Single</a></h6>
                </div>
            </div>
        </div>
        <div class="light-bg p-2">
            <div class="container">

                <div class="row  py-5">

                    <div class="col-md-10 mx-auto">
                        <figure class="hg-250 wh-auto">
                            <img src="{{asset('uploads/blog/'.$blog->image)}}" class="object-contain" alt="">
                        </figure>
                        <div>
                            <p>{!! $blog->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
@endsection
