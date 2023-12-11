@extends('admin.layouts.main')

@section('comment-section')

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
    <h2>Comment Management</h2>
    <br>

    <!-- Comment Table -->
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>User</th>
          <th>Comment</th>
          <th>Post</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

       @foreach ($comments as $item )
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->getUser->name}}</td>
                <td>{{$item->comment}}</td>
                <td>
                    <p>{{$item->getPost->post}}</p>
                </td>
                <td>
                    <a href="{{ url('comment/'. $item->id) }}"><button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCommentModal">Delete</button></a>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="5">{{$comments->links('pagination::bootstrap-5')}}</td>
            </tr>

      </tbody>
    </table>
  </div>
  @endsection
