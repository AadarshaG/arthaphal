@extends('frontend.layouts.master')

@section('main-content')
    <!-- SERVICES -->
    <section class="light-bg p-3 p-md-5">
        <div class="container">
            <div class="text-center">
                <h3 class=" border-top border-dark border-5 col-8 col-md-4 col-lg-2  mx-auto blue-color fw-bold pt-2 ">Services</h3>
                <h6>Best Services in the TOwn</h6>
            </div>
            <div class="row py-5 align-items-center">
                @foreach($services as $service)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow hover-inset  left-right-radius py-4 px-4">
                        <a href="{{url('service/'.$service->slug)}}" class="link-dark">
                            <figure class="hg-75">
                                <img src="{{asset('uploads/service/'.$service->image)}}" class="object-contain" alt="">
                            </figure>
                            <div class="card-body text-center">
                                <h6 class="fw-bold ">{{$service->title}}</h6>
                                <p class="card-text">{!! \Str::limit($service->description,100) !!}</p>
                            </div>
                        </a>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END -->
@endsection
