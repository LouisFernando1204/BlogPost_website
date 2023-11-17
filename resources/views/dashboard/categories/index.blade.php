@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-1 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>
</div>

@if(session()->has('create_success'))
  <div class="alert alert-success col-lg-7" role="alert">
      {{session('create_success')}}
  </div>
@endif

@if(session()->has('delete_success'))
  <div class="alert alert-success col-lg-7" role="alert">
      {{session('delete_success')}}
  </div>
@endif

@if(session()->has('update_success'))
  <div class="alert alert-success col-lg-7" role="alert">
      {{session('update_success')}}
  </div>
@endif

<div class="table-responsive col-lg-7">
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Category</a>
    <table class="table table-striped table-md">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
            <tr>
                <td style="width: 50px;">{{ $loop->iteration }}</td>
                <td style="width: 170px;">{{ $category->name }}</td>
                <td style="width: 200px;">
                  <a href="/dashboard/categories/{{$category->slug}}" class="btn btn-info"><i class="bi bi-eye-fill" style="color: white;"></i></a>
                  <form action="/dashboard/categories/{{ $category->slug }}/edit" method="get" class="d-inline">
                      @csrf
                      <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-square" style="color: white;"></i></button>
                  </form>
                  <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger"><i class="bi bi-x-circle" style="color: white;" onClick="return confirm('Are you sure want to delete this category?')"></i></button>
                  </form>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection