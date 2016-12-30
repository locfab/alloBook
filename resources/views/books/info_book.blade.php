<h2 class="text-capitalize"> {{ $book->title }}</h2>
@if($book->author)
    <p class="text-capitalize">author : <a href="{{route("authors.show", $book->author->id)}}"> {{$book->author->name}}</a></p>
@endif
@if($book->category->category)
    <p class="text-capitalize"> category : {{$book->category->category}} </p>
@endif
Synopsis : <p>{{ $book->synopsis }}</p>


