@extends('admin.adminMaster')

@section('admin')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('success')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container" style="margin-top: 20px;">
    {{-- <b>total users: {{count($userData)}}</b> --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Edit Home</div>
                <div class="card-body">
                    <form action="{{route('homeUpdate', ['id'=>$edits->id])}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                        <input type="hidden" name="oldImage" value="{{$edits->image}}">

                        <div class="form-group">
                            <label for="brandName">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{$edits->title}}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="brandName">Description</label>
                            <input type="text" name="description" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{$edits->description}}">
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="branImage">Background Image</label>
                            <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value=""> {{-- image is displayed
                            by below code so value is not needed--}}
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{asset('images/background')}}/{{$edits->image}}"
                                style="height: 200px; width:400px;" alt="">
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Update Home</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection