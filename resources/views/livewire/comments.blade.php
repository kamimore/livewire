<div class="">
    <h1 class="h1 text-center my-4">
        Comments
    </h1>
    <span class="text-danger px-3">
        @error('newComment')
            {{ $message }}
        @enderror
    </span>

    <div>
        <form class="d-flex align-items-center justify-content-center px-2" wire:submit.prevent="addComment">
            <div class="form-group col-8 col-md-10 px-2">
                <input type="text" class="form-control" aria-describedby="commentHelp"
                    placeholder="What's in your mind bro" wire:model.debounce.500ms="newComment">
            </div>
            <button class="btn btn-success col-4 col-md-2" type="submit">Add</button>
        </form>
        <div class="mx-3 mt-2 p-2 alert alert-success @if (session()->has('message')) visble @else invisible @endif">
            <span class="text-success">
                {{ session('message','Nothing') }}
            </span>
        </div>

        <div>
            @foreach ($comments as $key => $comment)
                <div class="card m-3">
                    <div class="d-flex align-items-center justify-content-between mx-2">
                        <div class="d-flex align-items-center justify-content-start pt-3 px-1">
                            <h3>{{ $comment->creator->name }}</h3>
                            <span class="mx-5"><u>{{ $comment->created_at->diffForHumans() }}</u></span>
                        </div>
                        <div class="text-danger h4 fw-bold " role="button"
                            wire:click="removeComment({{ $comment->id }})">
                            X
                        </div>
                    </div>
                    <p class="card-body">
                        {{ $comment->body }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
