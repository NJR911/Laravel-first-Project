@auth

    <div class="row">
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach

        <form action="{{ route('ideas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (Auth::user()->is_admin || Auth::user()->is_author)
                <h4> Share your Articles </h4>
                <div class="mb-3">
                    <div class="mt-4">
                        <input name="title" class="form-control mb-3" type="text" placeholder="Title">
                    </div>

                     <div class="mt-4">
                        <label for="category_id">Category:</label>
                        <select name="category_id" class="form-control">
                            @if(isset($categories) && $categories->count() > 0)
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    <option value="{{ $category->id }}"> </option>
                                @endforeach
                                <option >btata</option>
                            @else
                                <option name="category_id">No categories available</option>
                            @endif
                        </select>
                    </div>


                    <div class="">
                        <label for="">Article Picture:</label>
                        <input name="
                        image" class="form-control" type="file">
                        @error('image')
                            <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <textarea name="content" class="form-control" id="content" rows="3" placeholder="Article..."></textarea>
                        @error('content')
                            <span class="d-block fs-6 text-danger mt-2">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Share </button>
                </div>
            @else
                <h4>One day</h4>
            @endif

        </form>
    </div>

@endauth
@guest
    <h4>Join us to share your ideas</h4>
@endguest
