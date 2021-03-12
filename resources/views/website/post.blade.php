@extends('layouts.index')
@section('page_title','Post Page')
@section('header')
<header class="masthead" style="background-image: url('{{asset('storage/post/'.$result['0']->image)}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{ $result['0']->title }}</h1>
            <h2 class="subheading">{{ $result['0']->short_desc }}</h2>
            <span class="meta">Posted on {{ $result['0']->post_date }}</span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>{{ $result['0']->full_desc }}</p>
    </div>
  </div>
@endsection