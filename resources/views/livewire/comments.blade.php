<div class="">
    <h1 class="h1 text-center my-4">
        Comments
    </h1>
    <div>
        <div class="d-flex align-items-center justify-content-center px-2">
            <div class="form-group col-8 col-md-10 px-2">
                <input type="text" class="form-control" aria-describedby="commentHelp"
                    placeholder="What's in your mind bro" wire:model="newComment">
            </div>
            <button class="btn btn-success col-4 col-md-2" type="submit" wire:click="addComment">Add</button>
        </div>
        @foreach($comments as $key => $comment)
            <div class="card m-4">
                <div class="d-flex align-items-center justify-content-start pt-3 px-3">
                    <h3>{{ $comment['creator'] }}</h3>
                    <span class="mx-5"><u>{{ $comment['created_at'] }}</u></span>
                </div>
                <p class="card-body">
                    {{ $comment['body'] }}
                </p>
            </div>
        @endforeach
    </div>
</div>
