@extends('layouts.index')
@section('page_title','About Us Page')
@section('header')
<header class="masthead" style="background-image: url('{{asset('contents/website')}}/assets/img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>About Me</h1>
            <span class="subheading">This is what I do.</span>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>{{ $result[0]->description }}</p>
    </div>
  </div>
@endsection