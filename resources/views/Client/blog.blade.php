@extends('Client.master')
@section('content')
<section class="blog_wthree py-5">
        <div class="container">
            <h5 class="head_agileinfo text-center text-capitalize pb-5">
                <span>My Blog</span></h5>
            <!-- blog row -->
            <div class="">
                <div style="display: flex" class="">
                    @foreach($blog as $b)
                    <div style="height: 400px" class="card">
                        <center>
                        <a href="single.html">
                        <img style="width: 200px" class="card-img-top" src="/source/images-shirt/{{$b->image}}" alt="Card image cap">
                        </a>
                    </center>
                        <div class="card-body">
                            <h5 class="card-title blg_w3ls">
                                <a href="single.html">{{$b->title}}</a>
                            </h5>
                            <p style="white-space: nowrap; 
                            overflow: hidden; text-overflow: ellipsis;" class="card-text">{{$b->content}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="col-md-4 0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title blg_w3ls">
                                <a href="single.html">Blog Title</a>
                            </h5>
                            <p class="card-text">Donec sollicitudin molestie malesuada. Proin eget tortor risus..
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                    <div class="card text-white text-center">
                        <a href="single.html">
                            <img class="card-img" src="{{asset('source/images/a3.jpg')}}" alt="Card image">
                        </a>
                        <div class="card text-center p-3">
                            <blockquote class="blockquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                                <footer class="blockquote-footer">
                                    <small>
                                        Someone famous in
                                        <cite title="Source Title">Source Title</cite>
                                    </small>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title blg_w3ls">
                                <a href="single.html">Blog Title</a>
                            </h5>
                            <p class="card-text">TDonec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Vestibulum
                                ac diam sit.
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-0">
                    <div class="card">
                        <a href="single.html">
                            <img class="card-img" src="{{asset('source/images/blg2.jpg')}}" alt="Card image">
                        </a>
                    </div>
                    <div class="card p-3 text-right">
                        <blockquote class="blockquote mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer">
                                <small class="text-muted">
                                    Someone famous in
                                    <cite title="Source Title">Source Title</cite>
                                </small>
                            </footer>
                        </blockquote>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title blg_w3ls">
                                <a href="single.html">Blog Title</a>
                            </h5>
                            <p class="card-text">Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Vestibulum
                                ac diam sit amet quam vehicula elementum sed sit amet dui.</p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                        <a href="single.html">
                            <img class="card-img-top" src="{{asset('source/images/i10.jpg')}}" alt="Card image cap">
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection