@if(\Illuminate\Support\Facades\Auth::check())
    <a href="{{route('admin.books.show', $book->id)}}">
@else
    <a href="{{route('books.show', $book->id)}}">
@endif
        <h3 class="text-capitalize" style="font-size:18px;">
        {{ $book->title }}
    </a>
            <small>
                @if($book->moyBookMark($book->id) != 0)
                    @include('books.print_starts', ['nbStars' => round((float)$book->moyBookMark($book->id))])
                    {{'('.(round($book->moyBookMark($book->id)*2)/2).')'}}
                @else
                    {{ '(No mark)' }}
                @endif
            </small>
        </h3>
    @if($book->urlImage)
        <img src={{ $book->urlImage }} height="100" width="70" alt="Logo">
    @endif

    @if($book->author)
        <a href="{{route('authors.show', $book->author->id)}}"><p class="text-capitalize" style="font-size:14px;"> {{$book->author->name}} </p></a>
    @endif

