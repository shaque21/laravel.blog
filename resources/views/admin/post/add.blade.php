@extends('layouts.admin')
@section('page_title','Manage Post')
@section('content')
<div class="page-header">
    <h4 class="page-title">MANAGE POSTS</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="/admin">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="/admin/add_post">Add Posts</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-9 offset-md-1">
        <div class="card">
            <form action="{{ url('/admin/submit_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header text-center">
                <div class="card-title font-weight-bold text-primary">
                    <i class="fas fa-plus-circle"></i>
                    Add a new post
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label style="font-size: 15px !important;font-weight:600;" for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">   
                    @error('title')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label style="font-size: 15px !important;font-weight:600;" for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Slug">   
                    @error('slug')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label style="font-size: 15px !important;font-weight:600;" for="short_desc">Short Description</label>
                    <textarea class="form-control" name="short_desc" id="short_desc" rows="3">
                    
                    </textarea>
                    @error('short_desc')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label style="font-size: 15px !important;font-weight:600;" for="full_desc">Full Description</label>
                    <textarea class="form-control" name="full_desc" id="full_desc" rows="6">

                    </textarea>
                    @error('full_desc')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label style="font-size: 15px !important;font-weight:600;" for="post_date">Post Date</label>
                    <input type="date" class="form-control" name="post_date" id="post_date" ">
                    @error('post_date')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror   
                </div>
                <div class="form-group">
                    <label style="font-size: 15px !important;font-weight:600;" for="post_img">Image</label>
                    <input type="file" class="form-control-file" name="post_img" id="post_img">
                    @error('post_img')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-action">
                <input type="submit" class="btn btn-success form-control-file" name="submit" value="Submit"">
                
            </div> 
        </form>   
        </div>
    </div>
</div>
@endsection