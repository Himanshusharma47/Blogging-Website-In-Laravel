@extends('admin.layouts.main')

@push('title')
   Dashboard
@endpush

@section('dashboard')
    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="text-primary">Dashboard</h2>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Posts</h5>
                        <p class="card-text">{{ $totalpost }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">{{ $totaluser }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-5 mb-5">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Comments</h5>
                        <p class="card-text">{{ $totalcomment }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card dashboard-card">
            <div class="card-body">
                <h5 class="card-title">Posts Relationship With Category</h5>
                <canvas id="siteStatisticsChart" width="400" height="200"></canvas>
            </div>
        </div>

        <div class="card mt-4 mb-5">
            <div class="card-body">
                <h5 class="card-title text-warning">Recent Posts</h5>
                <ul>
                    @foreach ($post as $item)
                    <li class="text-primary"><b>{{$item->title}}</b><p>{{$item->post}}</p></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    
   <!--bar chart script-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // static chart script
        var ctx = document.getElementById('siteStatisticsChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($categoryLabels) !!},
                datasets: [{
                    label: 'Number of Posts per Category',
                    data: {!! json_encode($postsPerCategory) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
