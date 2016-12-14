<h2>{{ ucwords($book->title) }}</h2>
@if($book->author)
    <p><em> {{ucwords($book->author->name)}} </em></p>
@endif

<p>{{ $book->synopsis }}</p>

@if($book->urlImage)
    <img src={{ $book->urlImage }} height="400" alt="Logo" style="padding:20px;float:right;">
@endif
