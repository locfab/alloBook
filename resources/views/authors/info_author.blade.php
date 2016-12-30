<h2 class="text-capitalize"> {{ $author->name }}</h2>
@if($author->birth)
    <p> Date of birth: {{$author->birth}} </p>
@endif
@if($author->resume)
    <div> Resume: <p class="text-capitalize"> {{$author->resume}}</p> </div>
@endif


