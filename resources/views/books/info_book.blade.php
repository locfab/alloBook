<h2>{{ ucwords($book->title) }}</h2>
@if($book->author)
    <p><em> {{ucwords($book->author->name)}} </em></p>
@endif

<p>{{ $book->synopsis }}</p>


