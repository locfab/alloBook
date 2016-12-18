<p class="well">
    @if($review->comment)
        {{ $review->comment }}
    @else
        {{ "No comment..." }}
    @endif
</p>