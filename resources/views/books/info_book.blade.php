<h2 class="text-capitalize"> {{ $book->title }}</h2>
@if($book->author)
    <p class="text-capitalize">author : {{$book->author->name}}</p>
@endif
@if($book->category->category)
    <p class="text-capitalize"> category : {{$book->category->category}} </p>
@endif
Synopsis : <p>{{ $book->synopsis }}</p>


