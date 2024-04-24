@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        <h1 class="mb-4">Author Page</h1>
        {{-- @include('shared.success-message') --}}
        @include('ideas.shared.submit-idea')

    </div>
    <div class="col-3">
        @include('shared.follow-box')
    </div>
</div>
@endsection
