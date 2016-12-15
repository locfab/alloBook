<div class="col-md-4">
    <h2>{{ ucwords($book->title) }}</h2>
    <div style="display: inline-block">
        @if($book->urlImage)
            <img src={{ $book->urlImage }} height="150" alt="Logo">
        @endif
    </div>
    <div style="display: inline-block">
            @if($book->author)
                <p> {{ucwords($book->author->name)}} </p>
            @endif
            <p>{{ substr($book->synopsis,0,40) }}...</p>
            @if(Auth::check())
                @if(Auth::user()->books()->find($book->id))
                    <a class="btn btn-primary" href="{{ route('admin.books.show', $book->id) }}" role="button">Show</a>
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    @if(Auth::user()->marks->where('book_id',(int)$book->id)->first()->mark > 0)
                        @for($i = 0; $i < Auth::user()->marks->where('user_id', Auth::user()->id)->where('book_id',(int)$book->id)->first()->mark; $i++)
                            {{'*'}}
                        @endfor
                    @endif
                @else
                    <a class="btn btn-primary" href="{{ route('admin.books.show', $book->id) }}" role="button" style="bottom: 2px;">Show</a>
                @endif
            @else
                <a class="btn btn-primary" href="{{ route('books.show', $book->id) }}" role="button">Show</a>
            @endif
    </div>
</div>
