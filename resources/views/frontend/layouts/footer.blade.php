<footer class="light-bg pt-5 pb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 pb-3 pb-md-2 pb-lg-0">
                @php
                    $about = DB::table('abouts')->select('*')->first();
                @endphp
                @if(!empty($about))
                <figure class="hg-75">
                    <img src="{{asset('uploads/about/'.$about->image)}}" class="object-contain" alt="">
                </figure>
                <div>
                    <p>{!! \Str::limit($about->description,100) !!}</p>
                </div>
                @endif
            </div>
            <div class="col-lg-3 col-md-6 pb-3 pb-md-2 pb-lg-0">
                <div class="h6 fw-bold">Quick Links</div>
                <ul class="list-group">
                    <li class="list-group-item border-0 bg-transparent py-0">
                        <a href="{{url('about-us')}}" class="link-dark fs-6">- About</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-0">
                        <a href="{{url('services')}}" class="link-dark fs-6">- Services</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-0">
                        <a href="{{url('service/plan')}}" class="link-dark fs-6">- Saving Plans</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-0">
                        <a href="{{url('contact-us')}}" class="link-dark fs-6">- Contact</a>
                    </li><li class="list-group-item border-0 bg-transparent py-0">
                        <a href="{{url('blogs')}}" class="link-dark fs-6">- Blogs</a>
                    </li>
                </ul>


            </div>
            <div class="col-lg-3 col-md-6 pb-3 pb-md-2 pb-lg-0">
                <div class="h6 fw-bold">Contact</div>
                @php
                    $contact = DB::table('contacts')->select('*')->first();
                @endphp
                @if(!empty($contact))
                <ul class="list-group">
                    <li class="list-group-item border-0 bg-transparent py-0">
                        <span><i class="bi bi-geo-alt"></i></span>
                        <a href="" class="link-dark fs-6">{{$contact->address}}</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-0">
                        <span><i class="bi bi-telephone"></i></span>
                        <a href="tel:{{$contact->phone}}" class="link-dark fs-6">+977-{{$contact->phone}}</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-0">
                        <span><i class="bi bi-envelope"></i></span>
                        <a href="mailto:{{$contact->mail}}" class="link-dark fs-6">{{$contact->mail}}</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-0">
                        <span><i class="bi bi-globe"></i></span>
                        <a href="https://www.domain.site" class="link-dark fs-6">www.domain.site</a>
                    </li>
                </ul>
                @endif
            </div>
            <div class="col-lg-3 col-md-6 pb-3 pb-md-2 pb-lg-0">
                <div class="h6 fw-bold">Social</div>
                @php
                    $links = DB::table('links')->select('*')->get();
                @endphp
                @if(!empty($links))
                <ul class="list-group list-group-horizontal">
                    @foreach($links as $link)
                    <li class="list-group-item border-0 bg-transparent py-0">
                        <a href="{{$link->link}}" noreferrer target="_blank" class="link-dark fs-6">
                            <img src="{{asset('uploads/link/'.$link->icon)}}" class="hg-50 wh-auto" alt="">
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="border-top p-2">
            &copy; {{date('Y')}} Arthafal Multipurpose Co-operative Pvt. Ltd.
        </div>
    </div>

</footer>
