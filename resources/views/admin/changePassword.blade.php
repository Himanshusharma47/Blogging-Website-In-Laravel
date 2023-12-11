@extends('admin.layouts.main')

@section('change-password')
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
    <!-- Login Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6"> <!-- Increase the width -->
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Reset Password</h3>
                        <form action="{{ route('change.password') }}" method="post">
                            @csrf
                            <div class="mb-3"> <!-- Increase the height -->
                                <label for="oldPassword" class="form-label">Old Password</label>
                                <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                            </div>
                            <div class="mb-3"> <!-- Increase the height -->
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                            </div>
                            <div class="mb-3"> <!-- Increase the height -->
                                <label for="confNewPassword" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" id="confNewPassword" name="confNewPassword" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-30">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
