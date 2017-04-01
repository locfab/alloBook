<style>
    .element {
        max-height: 70px;
        overflow:hidden;
        text-overflow:ellipsis;
    }
    .userMark
    {
        color: blue;
    }
    #toctoc{
        height: $("#image").css("height");
    }
</style>

<div class="col-md-6">
    <h2 class="text-capitalize">{{ $book->title }}</h2>
    <div class="row">
        <div class="col-md-4">
            @if($book->urlImage)
                <img src={{ $book->urlImage }} style: height="220" width="155" alt="Logo" id="image">
            @endif
        </div>
        <div class="col-md-8" id="toctoc">
            <div class="col">
                <div class="row-md-8">
                    @if($book->author)
                         <p class="text-capitalize"> Author:  <a href="{{route("authors.show", $book->author->id)}}"> {{$book->author->name}} </a></p>
                    @endif
                    @if($book->category->category)
                        <p class="text-capitalize"> category : {{$book->category->category}} </p>
                    @endif
                        Synopsis : <p class="element"> {{ $book->synopsis }}</p>
                </div>
                <div class="row-md-4">
                    @if(Auth::check())
                        @if(Auth::user()->books()->find($book->id))
                            <a class="btn btn-primary" href="{{ route('admin.books.show', $book->id) }}" role="button">Show</a>
                            <i class="fa fa-check"></i>
                            @include('books.print_starts', ['nbStars' => Auth::user()->marks->where('book_id',(int)$book->id)->first()->mark])
                        @else
                            <a class="btn btn-primary" href="{{ route('admin.books.show', $book->id) }}" role="button">Show</a>
                        @endif
                    @else
                        <a class="btn btn-primary" href="{{ route('books.show', $book->id) }}" role="button">Show</a>
                    @endif
                    <div class="userMark">
                        @if(isset($user))
                            @if($user->marks->where('book_id',(int)$book->id)->first()->mark > 0)
                                {{ ucwords($user->name)." : " }}
                                @include('books.print_starts', ['nbStars' => $user->marks->where('user_id', $user->id)->where('book_id',(int)$book->id)->first()->mark])
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
