{{ "Mark:" }}
<p class="well">
    @if($review->mark>0)
        {{ $review->mark }}
    @else
        {{ "No mark..." }}
    @endif
</p>