@extends('admin.layouts.main')

@section('category-section')

 <!-- Display error message if available in the session -->
 @if(session('error'))
 <div class="alert alert-danger">
     {{ session('error') }}
 </div>
 @endif

 <!-- Display success message if available in the session -->
 @if (session('success'))
     <div class="alert alert-success">
         {{ session('success') }}
     </div>
 @endif

<!-- Page Content -->
<div class="container mt-4">
    <h2>Category Management</h2>
    <br>

    <!-- Add Post Button -->
    <div class="mb-3">
        <a href="{{ route('admin.addcategory') }}" ><button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addPostModal">
            Add Category
        </button></a>
    </div>

    <br>
    <!--search category-->
    <div class="mb-3" style="width: 30%">
        <form action="{{ route('search.category') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="category" name="category" placeholder="Search category" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
    </div>

    <!-- Category Table -->
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Category</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->category}}</td>
            <td>{{$category->description}}</td>
            <td>
                <a href="{{ url('category/'. $category->id) }}" ><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Delete</button></a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3">
                {{$categories->links('pagination::bootstrap-5')}}
            </td>
        </tr>
      </tbody>
    </table>
  </div>

  @endsection
