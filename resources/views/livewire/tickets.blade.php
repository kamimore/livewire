<div>
    <h2>Support tickets</h2>
    <div>
        @foreach ($tickets as $key => $ticket)
            <div class="card mx-0 mx-lg-0 my-2 my-lg-3 {{ $active == $ticket->id ? 'bg-light' : '' }}" role="button"
                wire:click="$emit('ticketSelected',{{ $ticket->id }})">
                <p class="card-body mb-0 pb-2" role="button">
                    {{ $ticket->questions }}
                </p>
            </div>
        @endforeach
    </div>
</div>
