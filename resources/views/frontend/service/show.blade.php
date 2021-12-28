@extends('frontend.layouts.master')

@section('main-content')
    <!-- SERVICES -->
    <section class="">
        <div class="green-bg">
            <div class="container p-3 p-md-5">
                <div class="text-start text-white ">
                    <h3 class=" border-top border-dark border-5 col-8 col-md-4 col-lg-2  fw-bold pt-2 ">{{$service->title}}</h3>
                    <h6><a href="{{url('services')}}" class="link-light">Services</a>/ <a href="" class="link-light">Single</a></h6>
                </div>
            </div>
        </div>
        <div class="light-bg p-2">
            @include('admin.section.message')
            <div class="container">

                <div class="row  py-5 align-items-center">

                    <div class="col-md-6">
                        <div>
                            <p>{!! $service->description !!}</p>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <figure class="hg-250 wh-auto m-0">
                            <img src="{{asset('uploads/service/'.$service->image)}}" class="object-contain" alt="">
                        </figure>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-5" id="finance">
                        <h5 class="border-start border-2 blue-border ps-2">Related Documents</h5>
                        @if(!empty($servicepdf))
                        <ul class="list-group list-group-flush">
                            @foreach($servicepdf as $serv)
                            <li class="list-group-item bg-transparent">
                                <a href="" class="link-dark">{{$serv->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    <!-- INQUIRY -->
    <section class="light-bg p-3 p-md-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-7">
                    <div class="ps-0 ps-md-0 ps-lg-5 ms-0 ms-md-5">
                        <h5 class="fw-bold">Make an Inquiry</h5>
                        <div class="">
                            <form action="{{url('send/plan/inquiry')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="plan_name" value="{{$service->title}}">
                                <div class="row">
                                    <div class=" mb-4 col-12 col-md-8">
                                        <input type="text" name="name" class="form-control border-0"  placeholder="Full Name" required>
                                    </div>
                                    <div class=" mb-4 col-12 col-md-8">
                                        <input type="email" name="email" class="form-control border-0"  placeholder="Email" required>
                                    </div>
                                    <div class=" mb-4 col-12 col-md-8">
                                        <input type="number" name="contact" class="form-control border-0"  placeholder="Contact" required>
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
