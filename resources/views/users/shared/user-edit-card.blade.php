<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $user->getImageURL() }}" alt="Mario Avatar">
                    <div>
                        <input name="name" class="form-control" type="text" value="{{ $user->name }}">
                        @error('name')
                            <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div>
                    @auth()
                        @if (Auth::id() === $user->id)
                            <div>
                                <a href="{{ route('users.show', $user->id) }}"> View </a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="mt-4">
                <label for="">Profile Picture:</label>
                <input name="image" class="form-control" type="file">
                @error('image')
                    <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> About : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-2">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <button class="btn btn-dark btn-sm mb-3">Save</button>


                @include('users.shared.user-states')

            </div>
        </form>
    </div>
</div>
