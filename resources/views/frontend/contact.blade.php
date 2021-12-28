@extends('frontend.layouts.master')

@section('main-content')
    <!-- Contact US -->
    <section class="light-bg p-3 p-md-5">
        @include('admin.section.message')
        <div class="container">
            <div class="text-center">
                <h3 class=" border-top border-dark border-5 col-8 col-md-4 col-lg-2  mx-auto blue-color fw-bold pt-2 ">Contact Us</h3>
                <h6>Inquire about us</h6>
            </div>
            <div class="row py-5">
                <div class="col-md-6">
                    <figure class="hg-75">
                        <img src="{{asset('uploads/logo/'.$logo->image)}}" class="object-contain" alt="">
                    </figure>
                    <ul class="list-group ps-0 ps-lg-5 ms-0 ms-lg-5">
                        <li class="list-group-item border-0 bg-transparent py-2">
                            <span><i class="bi bi-geo-alt"></i></span>
                            <a href="{{url('about-us')}}" class="link-dark fs-6">{{$contact->address}}</a>
                        </li>
                        <li class="list-group-item border-0 bg-transparent py-2">
                            <span><i class="bi bi-telephone"></i></span>
                            <a href="tel:{{$contact->phone}}" class="link-dark fs-6">+977-{{$contact->phone}}</a>
                        </li>
                        <li class="list-group-item border-0 bg-transparent py-2">
                            <span><i class="bi bi-envelope"></i></span>
                            <a href="mailto:{{$contact->mail}}" class="link-dark fs-6">{{$contact->mail}}</a>
                        </li>
                        <li class="list-group-item border-0 bg-transparent py-2">
                            <span><i class="bi bi-globe"></i></span>
                            <a href="https://www.domain.site" class="link-dark fs-6">www.domain.site</a>
                        </li>
                    </ul>
                    <ul class="list-group list-group-horizontal my-5 justify-content-center">
                        @foreach($links as $link)
                        <li class="list-group-item border-0 bg-transparent py-0">
                            <a href="{{$link->link}}" noreferrer target="_blank" class="link-dark fs-6">
                                <img src="" class="hg-50 wh-auto" alt="">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="">
                        <iframe src="{!! $contact->iframe !!}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
