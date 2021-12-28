@extends('frontend.layouts.master')

@section('main-content')
    <!-- Blogs -->
    <section class="light-bg p-3 p-md-5">
        <div class="container">
            <div class="text-center">
                <h3 class=" border-top border-dark border-5 col-8 col-md-4 col-lg-2  mx-auto blue-color fw-bold pt-2 ">Blogs</h3>
                <h6>For you</h6>
            </div>
            @if(!empty($blogs))
            <div class="row py-5 align-items-center">
                @foreach($blogs as $blog)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow hover-inset rounded">
                        <a href="{{url('blog/'.$blog->slug)}}" class="link-dark">
                            <figure class="hg-150" >
                                <img src="{{asset('uploads/blog/'.$blog->image)}}" class="object-cover rounded-top" alt="">
                            </figure>
                            <div class="card-body text-center">
                                <h6 class=" hg-75 hide-overflow" >{!! \Str::limit($blog->description,100) !!}</h6>
                            </div>
                        </a>
                    </div>

                </div>
                @endforeach
            </div>
             @endif
        </div>
    </section>
    <!-- END -->
@endsection
