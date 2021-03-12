@extends('layouts.index')
@section('page_title','Home Page')
@section('header')
<header class="masthead" style="background-image: url('{{asset('contents/website')}}/assets/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>My First Blog</h1>
          </div>
        </div>
      </div>
    </div>
</header>
@endsection
@section('content')
<div class="row">
    @foreach ($result as $item)
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <a href="{{ url('/sample-post/'.$item->slug) }}">
                    <h2 class="post-title">
                        {{ $item->title }}
                    </h2>
                    <h3 class="post-subtitle">
                        {{ $item->short_desc }}
                    </h3>
                </a>
                <p class="post-meta">Posted on {{ $item->post_date }} </p>
            </div>
            <hr>
        
        <!-- Pager -->
        <div class="clearfix">
            <a class="btn btn-primary float-right" href="{{ url('/sample-post/'.$item->slug) }}">View More &rarr;</a>
        </div>
        </div>
    @endforeach
    
</div>
@endsection