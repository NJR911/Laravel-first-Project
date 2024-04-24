<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            {{-- <div>
                <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a class="mx-2" href="{{ route('idea.edit', $idea->id) }}"> Edit </a>
                    <a href="{{ route('idea.show', $idea->id) }}"> View </a>
                    <button class="btn btn-danger btn-sm ms-1">X</button>
                </form>
            </div> --}}

            @if (auth()->check() && auth()->user()->is_admin)
                <div>
                    <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                    <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                    <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm ms-1" type="submit">X</button>
                    </form>
                </div>
            @else
                <div>
                    <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                    @if (auth()->check() && auth()->user()->id == $idea->user->id)
                        <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                        <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ms-1" type="submit">X</button>
                        </form>
                    @endif
                </div>
            @endif

        </div>
    </div>


    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                {{-- <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-2">
                            {{ $message }}
                        </span>
                    @enderror
                </div> --}}
                <div class="mt-4">
                    <input name="title" class="form-control mb-3" type="text" value="{{ $idea->title }}">
                </div>

                <div class="">
                    <label for="">Article Picture:</label>
                    <input name="image" class="form-control" type="file">
                    @error('image')
                        <span class="text-danger fs-6">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <textarea name="content" class="form-control" id="content" rows="3" placeholder="Article...">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-2">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-dark mb-2"> Update </button>
                </div>
            </form>
        @else
            {{-- <h2>{{ $idea->title }}</h2>
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
            <img class="img-thumbnail" src="{{ asset("storage/" . $idea->image) }}" alt="{{ $idea->title }}">

            <div class="d-flex justify-content-between mt-4">
                @include('ideas.shared.like-button')
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at->diffForHumans() }} </span>
                </div>
            </div> --}}

            <div class="mt-4">
                <strong>Category:</strong>
                <span>{{ $idea->category }}</span>
            </div>

            <h2>{{ $idea->title }}</h2>
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
            <img class="img-thumbnail" src="{{ asset('storage/' . $idea->image) }}" alt="{{ $idea->title }}">

            <div class="d-flex justify-content-between mt-4">
                @include('ideas.shared.like-button')
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at->diffForHumans() }} </span>
                </div>
            </div>


            @include('ideas.shared.comments-box')
        @endif
    </div>
</div>
