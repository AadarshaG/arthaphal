@extends('frontend.layouts.master')

@section('main-content')
    <!-- HERO -->
    @if(!empty($banner))
    <section id="hero">
        @foreach($banner as $bann)
        <figure class="m-0 hg-400" >
            <img src="{{asset('uploads/slider/'.$bann->image)}}" class="object-cover" alt="">
        </figure>
        @endforeach
    </section>
    @endif

    <!-- END -->

    <!-- ABOUT US -->
    @if(!empty($about))
    <section class="light-bg p-3 p-md-5">
        <div class="container">
            <h3 class="text-center border-top border-dark border-5 col-8 col-md-4 col-lg-2  mx-auto blue-color fw-bold pt-2 ">About Us</h3>
            <div class="row py-3 align-items-center">
                <div class="col-md-7">
                    <div class="ms-0 ms-md-4">
                        <p>{!! \Str::limit($about->description,350) !!}</p>
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
    <!-- SERVICES -->
    @if(!empty($services))
    <section class="bg-white p-3 p-md-5">
        <div class="container">
            <h3 class="text-center border-top border-dark border-5 col-8 col-md-4 col-lg-2  mx-auto blue-color fw-bold pt-2 ">Services</h3>
            <div class="row py-3 align-items-center">
                @foreach($services as $service)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow hover-inset  left-right-radius py-4 px-4">
                        <a href="" class="link-dark">
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
    @endif
    <!-- END -->

    <!-- CALCULATOR -->
    <section class="light-bg p-3 p-md-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-md-7">
                    <figure class="m-md-0 hg-40">
                        <img src="{{asset('frontend/img/Rectangle 20.png')}}" class="" alt="">
                    </figure>
                </div>
                <div class="col-12 col-md-5">
                    <h5 class="fw-bold">EMI CALCULATOR</h5>
                    <div class="border-1 border border-dark p-4">
                        <form>
                            <div class="row">
                                <div class=" mb-4 col-12 col-md-6">
                                    <input type="email" class="form-control border-0"  placeholder="Principal Amount">
                                </div>
                                <div class=" mb-4 col-12 col-md-6">
                                    <input type="email" class="form-control border-0"  placeholder="Tenure( in Months )">
                                </div>
                                <div class=" mb-4 col-12 col-md-6">
                                    <select class="form-select border-0" aria-label="Default select example">
                                        <option selected disabled>Loan Type</option>
                                        <option value="1">Type One</option>
                                        <option value="2">Type Two</option>
                                        <option value="3">Type Three</option>
                                    </select>
                                </div>
                                <div class=" mb-4 col-12 col-md-6">
                                    <input type="email" class="form-control border-0"  placeholder="Interest Rate (%)">
                                </div>
                            </div>


                            <button type="button" class="m-auto btn btn-success green-bg border-0">Calculate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- SAVING PLANS-->
    @if(!empty($products))
    <section class="bg-white p-3 p-md-5">
        <div class="container">
            <h3 class="text-center border-top border-dark border-5 col-8 col-md-4 col-lg-3  mx-auto blue-color fw-bold pt-2 ">Saving Plans</h3>
            <div class="row py-3 align-items-center">
                @foreach($products as $produ)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow hover-inset  left-right-radius py-4 px-4">
                        <a href="{{url('service/plan/'.$produ->slug)}}" class="link-dark">
                            <figure class="hg-75">
                                <img src="{{asset('uploads/product/'.$produ->image)}}" class="object-contain" alt="">
                            </figure>
                            <div class="card-body text-center">
                                <h6 class="fw-bold ">{{$produ->title}}</h6>
                                <p class="card-text">{!! \Illuminate\Support\Str::limit($produ->description,100) !!}</p>
                            </div>
                        </a>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- END -->


    <!-- INQUIRY -->
    <section class="light-bg p-3 p-md-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-7">
                    <div class="ps-0 ps-md-0 ps-lg-5 ms-0 ms-md-5">
                        <h5 class="fw-bold">Make an Inquiry</h5>
                        <div class="">
                            <form action="{{url('send/inquiry')}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class=" mb-4 col-12 col-md-8">
                                        <input type="text" name="full_name" class="form-control border-0"  placeholder="Full Name" required>
                                    </div>
                                    <div class=" mb-4 col-12 col-md-8">
                                        <input type="email" name="email" class="form-control border-0"  placeholder="Email" required>
                                    </div>
                                    <div class=" mb-4 col-12 col-md-8">
                                        <input type="number" name="phone" class="form-control border-0"  placeholder="Contact" required>
                                    </div>

                                    <div class=" mb-4 col-12 col-md-8">
                                        <textarea rows="4" name="message" class="form-control border-0" placeholder="Type your message.." required></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="m-auto btn btn-primary blue-bg border-0">Send</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <figure class="m-md-0 hg-40">
                        <img src="{{asset('frontend/img/Rectangle 20.png')}}" class="" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->
@endsection
