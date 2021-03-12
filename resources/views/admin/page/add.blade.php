@extends('layouts.admin')
@section('page_title','Manage Pages')
@section('content')
<div class="page-header">
    <h4 class="page-title">MANAGE PAGES</h4>
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
            <a href="{{ url('/admin/add_page') }}">Add Page</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-9 offset-md-1">
        <div class="card">
            <form action="{{ url('/admin/submit_page') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header text-center">
                <div class="card-title font-weight-bold text-primary">
                    <i class="fas fa-plus-circle"></i>
                    Add a new page
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label style="font-size: 15px !important;font-weight:600;" for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">   
                    @error('name')
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
                    <label style="font-size: 15px !important;font-weight:600;" for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="5">
                    
                    </textarea>
                    @error('description')
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