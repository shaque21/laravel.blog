@extends('layouts.index')
@section('page_title',$result[0]->name.' page')
@section('header')
<header class="masthead" style="background-image: url('{{asset('contents/website')}}/assets/img/contact-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="page-heading">
          <h1>Contact Me</h1>
          <span class="subheading">Have questions? I have answers.</span>
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
    <form method="POST" action="{{ url('/contact_submit') }}">
      @csrf
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Name</label>
          <input type="text" class="form-control" placeholder="Name" name="name" id="name" required data-validation-required-message="Please enter your name.">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Email Address</label>
          <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" required data-validation-required-message="Please enter your email address.">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group col-xs-12 floating-label-form-group controls">
          <label>Phone Number</label>
          <input type="tel" class="form-control" placeholder="Phone Number" name="mobile" id="phone" required data-validation-required-message="Please enter your phone number.">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>Message</label>
          <textarea rows="5" class="form-control" placeholder="Message" name="message" id="message" required data-validation-required-message="Please enter a message."></textarea>
          <p class="help-block text-danger"></p>
        </div>
      </div>
      <br>
      <div id="success"></div>
      <input type="submit" class="btn btn-primary" id="sendMessageButton" value="Send">
    </form>
  </div>
</div>
@endsection