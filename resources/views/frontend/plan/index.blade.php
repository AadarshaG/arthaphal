@extends('frontend.layouts.master')

@section('main-content')
    <!-- SERVICES -->
    <section class="light-bg p-3 p-md-5">
        <div class="container">
            <div class="text-center">
                <h3 class=" border-top border-dark border-5 col-8 col-md-4 col-lg-2  mx-auto blue-color fw-bold pt-2 ">Service Plan</h3>
                <h6>Best Service Plan</h6>
            </div>
            <div class="row py-5 align-items-center">
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card shadow hover-inset  left-right-radius py-4 px-4">
                            <a href="{{url('service/plan/'.$product->slug)}}" class="link-dark">
                                <figure class="hg-75">
                                    <img src="{{asset('uploads/product/'.$product->image)}}" class="object-contain" alt="">
                                </figure>
                                <div class="card-body text-center">
                                    <h6 class="fw-bold ">{{$product->title}}</h6>
                                    <p class="card-text">{!! \Str::limit($product->description,100) !!}</p>
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
