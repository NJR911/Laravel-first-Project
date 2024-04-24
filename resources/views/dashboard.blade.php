@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            {{-- @include('ideas.shared.submit-idea') --}}
            <h1> Articles </h1>
            <hr>
                @forelse ($ideas as $idea)
                    <div class="mt-3">
                        @include('ideas.shared.idea-card')
                    </div>
                @empty
                    <p class="text-center my-4">No Results Found.</p>
                @endforelse

            <div class="m-3">
                {{ $ideas->withQueryString()->links() }}
            </div>

        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
