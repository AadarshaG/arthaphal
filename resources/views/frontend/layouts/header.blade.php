<header>
    <div class="green-bg position-relative ">

        <div class="triangle-bottom-left">
            <div class="container ">
                @php
                    $contact = DB::table('contacts')->select('*')->first();
                @endphp
                @if(!empty($contact))
                <div class=" py-2 d-flex justify-content-end flex-wrap">
                    <a href="tel:{{$contact->phone}}" class="text-white px-2 "><i class="bi bi-telephone"></i> +977 - {{$contact->phone}}</a>
                    <a href="mailto:{{$contact->mail}}" class="text-white px-2"><i class="bi bi-envelope"></i> {{$contact->mail}}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            @php
                $logo = DB::table('logos')->select('*')->first();
            @endphp
            @if(!empty($logo))
            <a class="navbar-brand" href="{{url('/')}}">
                <figure class="m-0 hg-100 wh-auto">
                    <img src="{{asset('uploads/logo/'.$logo->image)}}" class="" alt="">
                </figure>
            </a>
            @endif
            <button class="navbar-toggler border-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-0 m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('about-us')}}">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" >
                            Downloads
                        </a>
                        @php
                            $categorys = DB::table('categories')->select('*')->get();
                        @endphp
                        @if(!empty($categorys))
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categorys as $cate)
                            <li>
                                <a class="dropdown-item" href="{{url('download/'.$cate->slug)}}">{{$cate->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                         @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('services')}}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('service/plan')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('contact-us')}}">Contact</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
</header>
