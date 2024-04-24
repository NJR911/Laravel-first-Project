@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6 mt-4">

            <h1>Terms</h1>
            <div>
                Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Est commodi incidunt
                accusantium nemo deserunt pariatur eum dolorem id,
                modi vel voluptatibus voluptatum deleniti, quidem
                perferendis! Optio illo quibusdam ad reprehenderit
                suscipit! Soluta illo at perferendis.
            </div>
        </div>
        <div class="col-3">
            {{-- @include('shared.search-bar') --}}
            @include('shared.follow-box')
        </div>
    </div>
@endsection
