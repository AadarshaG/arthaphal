@extends('frontend.layouts.master')

@section('main-content')
    <!-- ABOUT US -->
    @if(!empty($about))
    <section class="light-bg p-3 p-md-5">
        <div class="container">
            <div class="text-center">
                <h3 class=" border-top border-dark border-5 col-8 col-md-4 col-lg-2  mx-auto blue-color fw-bold pt-2 ">{{$about->title}}</h3>
                <h6>{{$about->top_description}}</h6>
            </div>
            <div class="row py-5 align-items-center">
                <div class="col-md-7">
                    <div class="ms-0 ms-md-4">
                        <p>{!! $about->description !!}</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <figure class="hg-250">
                        <img src="{{asset('uploads/about/'.$about->image)}}" class="object-contain" alt="">
                    </figure>
                </div>

            </div>
        </div>
    </section>
    @endif
    <!-- END -->
@endsection
