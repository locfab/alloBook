<p>
    @if(Auth::check())
        @if(Auth::user()->books()->find($book->id))
            <a class="btn btn-warning" href="{{ route('remove', $book->id) }}" role="button">Remove to my list</a>
        @else
            <a class="btn btn-primary" href="{{ route('add', $book->id) }}" role="button">Add to my list</a>
        @endif
    @endif
</p>