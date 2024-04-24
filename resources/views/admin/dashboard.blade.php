@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.left-sidebar')
        </div>

        <div class="col-9">
            <h1>Admin Dashboard</h1>

            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Users</h3>
                            <p class="fw-bold fs-2">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Ideas</h3>
                            <p class="fw-bold fs-2">{{ $totalIdeas }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
