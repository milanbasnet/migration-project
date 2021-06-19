@extends('admin.adminMaster')

@section('admin')
<div class="container" style="margin-top: 20px;">
  {{-- <b>total users: {{count($userData)}}</b> --}}
  <div class="row">
    <div class="col-md-8">
      {{-- to show success message --}}
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <div class="card">
        <div class="card-header">Home</div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">S.N</th>
              <th scope="col">Home Title</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($homeData as $item)
            <tr>
              <th scope="row">{{$i++}}</th>
              <td>{{$item->title}}</td>
              <td>{{$item->description}}</td>
              <td><img src="{{asset('images/background')}}/{{$item->image}}" style="height: 40px; width=70px;" alt=""></td>
              <td>
                <a href="{{route('homeEdit',['id'=>$item->id])}}" class="btn btn-info">Edit</a>
                <a href="{{route('homeDelete', ['id'=>$item->id])}}" onclick="return confirm('Are you sure to delete')"
                   class="btn btn-danger">Delete</a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{-- {{$brands->links('pagination::bootstrap-4')}} --}}
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">Add Home</div>
        <div class="card-body">
          <form action="{{route('storeHome')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
              @error('title')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" name="description" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
              @error('description')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
                <label for="brandImage">Background Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp">
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add Home</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection