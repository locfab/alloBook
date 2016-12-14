<div class="col-md-4">
    <h2>{{ ucwords($book->title) }}</h2>
    @if($book->author)
        <p><em> {{ucwords($book->author->name)}} </em></p>
    @endif
    <p>{{ substr($book->synopsis,0,50) }}...</p>
    <p>
        @if(Auth::check())
            @if(Auth::user()->books()->find($book->id))
                <a class="btn btn-primary" href="{{ route('admin.books.show', $book->id) }}" role="button">Show</a>
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                @if(Auth::user()->reviews->where('book_id', (int)$book->id)->first()->mark > 0)
                    @for($i = 0; $i < Auth::user()->reviews->where('book_id', (int)$book->id)->first()->mark; $i++)
                        {{'*'}}
                    @endfor
                @endif
            @else
                <a class="btn btn-primary" href="{{ route('admin.books.show', $book->id) }}" role="button">Show</a>
            @endif
        @else
            <a class="btn btn-primary" href="{{ route('books.show', $book->id) }}" role="button">Show</a>
        @endif
        @if($book->urlImage)
            <img src={{ $book->urlImage }} height="30" alt="Logo">
        @endif
    </p>
</div>
