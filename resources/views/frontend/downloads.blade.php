@extends('frontend.layouts.master')

@section('main-content')
    <section class="p-2 p-md-4 p-lg-5 light-bg">
        <div class="container">
            <div class="col-12 col-md-8 mx-auto">
                <div class="text-center">
                    <h3 class=" border-top border-dark border-5 col-8 col-md-4 col-lg-2  mx-auto blue-color fw-bold pt-2 ">Downloads</h3>

                </div>
                <div class="mb-5" id="finance">
                    <h5 class="border-start border-2 blue-border ps-2">{{$category->title}}</h5>
                    <ul class="list-group list-group-flush">
                        @foreach($downloads as $down)
                        <li class="list-group-item bg-transparent">
                            <a href="" class="link-dark">{{$down->title}}</a>
                        </li>
                         @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
