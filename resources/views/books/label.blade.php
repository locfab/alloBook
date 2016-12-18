<style>
    /*.row-md-8{
        border-width:1px;
        border-style:solid;
        border-color:yellow;
    }
    .row-md-4{
        border-width:1px;
        border-style:solid;
        border-color:orange;
    }
    .col-md-4{
        border-width:1px;
        border-style:solid;
        border-color:green;
    }
    .col-md-8{
        border-width:1px;
        border-style:solid;
        border-color:blue;
    }
    .col-md-6{
        border-width:1px;
        border-style:solid;
        border-color:black;
    }
    .col{
        border-width:1px;
        border-style:solid;
        border-color:fuchsia;
    }
    .col-md-6
    {
        border-width:1px;
        border-style:solid;
        border-color:black;
    }*/

</style>

<div class="col-md-6">
    <h2 class="text-capitalize">{{ $book->title }}</h2>
    <div class="row">
        <div class="col-md-4">
            @if($book->urlImage)
                <img src={{ $book->urlImage }} height="220" width="155" alt="Logo">
            @endif
        </div>
        <div class="col-md-8">
            <div class="col">
                <div class="row-md-8">
                    @if($book->author)
                        <p class="text-capitalize"> title : {{$book->author->name}} </p>
                    @endif
                    @if($book->category->category)
                        <p class="text-capitalize"> category : {{$book->category->category}} </p>
                    @endif
                        Synopsis : <p> {{ substr($book->synopsis,0,130) }}...</p>
                </div>
                <div class="row-md-4">
                    @if(Auth::check())
                        @if(Auth::user()->books()->find($book->id))
                            <a class="btn btn-primary" href="{{ route('admin.books.show', $book->id) }}" role="button">Show</a>
                            <i class="fa fa-check"></i>
                                @if(Auth::user()->marks->where('book_id',(int)$book->id)->first()->mark > 0)
                                @for($i = 0; $i < Auth::user()->marks->where('user_id', Auth::user()->id)->where('book_id',(int)$book->id)->first()->mark; $i++)
                                    {{'*'}}
                                @endfor
                            @endif
                        @else
                            <a class="btn btn-primary" href="{{ route('admin.books.show', $book->id) }}" role="button">Show</a>
                        @endif
                    @else
                        <a class="btn btn-primary" href="{{ route('books.show', $book->id) }}" role="button">Show</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
