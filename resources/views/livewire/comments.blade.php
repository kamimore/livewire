<div class="">
    <h2 class="pb-2">
        Comments
    </h2>

    @error('image')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror

    <div>
        @if ($image)
            <img class="mx-3" src="{{ $image->temporaryUrl() }}" width="60">
        @endif
        <section class="mx-2 mx-lg-2 mb-2">
            <input class="form-control" type="file" id="image" wire:model="image">
        </section>
        <form class="d-flex align-items-center justify-content-center px-0" wire:submit.prevent="addComment">
            <div class="form-group col-8 col-md-10 px-2">
                <input type="text" class="form-control" aria-describedby="commentHelp"
                    placeholder="What's in your mind bro" wire:model.debounce.500ms="newComment">
            </div>
            <button class="btn btn-success col-4 col-md-2" type="submit">Add</button>
        </form>
        @error('newComment')
            <span class="text-danger">
                {{ $message }}
            </span>
        @enderror
        @if (session()->has('message'))
            <div class="mx-2 mt-2 p-2 alert alert-success">
                <span class="text-success">
                    {{ session('message', 'Nothing') }}
                </span>
            </div>
        @endif

        <div>
            @foreach ($comments as $key => $comment)
                <div class="card mx-0 my-3 my-lg-3">
                    <div class="d-flex align-items-center justify-content-between mx-2">
                        <div class="d-flex align-items-center justify-content-start pt-3 px-1">
                            <h4>{{ $comment->creator->name }}</h4>
                            <span class="mx-5"><u>{{ $comment->created_at->diffForHumans() }}</u></span>
                        </div>
                        <div class="text-danger h4 fw-bold " role="button"
                            wire:click="removeComment({{ $comment->id }})">
                            X
                        </div>
                    </div>
                    <p class="card-body mb-0 pb-2">
                        {{ $comment->body }}
                    </p>
                    @if ($comment->image)
                        <img class="mx-2 my-2" height="50" width="50" src="{{ $comment->imagePath }}"
                            alt="{{ $comment->creator->name }}">
                    @endif
                </div>
            @endforeach
            {{ $comments->links('pagination') }}
        </div>
    </div>
</div>
