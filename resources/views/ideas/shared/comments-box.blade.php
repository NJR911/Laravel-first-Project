<div class="mt-2">
    @auth
        <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
            @csrf
            {{-- @method('post') --}}
            <div class="mb-3">
                <textarea id="commentContent" name="content" class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <button id="submitButton" type="submit" class="btn btn-primary btn-sm {{ empty(old('content')) ? 'disabled' : '' }}"> Post Comment </button>
            </div>
        </form>
    @endauth

    <hr>

    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}"
                alt="{{ $comment->user->name }} Avatar">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">{{ $comment->user->name }}
                    </h6>
                    <small class="fs-6 fw-light text-muted"> {{ $comment->created_at->diffForHumans() }} </small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @empty
        <p class="text-center mt-3">No comments yet</p>
    @endforelse
</div>

<script>
    const commentContent = document.getElementById('commentContent');
    const submitButton = document.getElementById('submitButton');

    commentContent.addEventListener('input', function() {
        if (commentContent.value.trim() === '') {
            submitButton.classList.add('disabled');
        } else {
            submitButton.classList.remove('disabled');
        }
    });
</script>
