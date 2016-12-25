@extends('layouts.app')
@section('title')
    {{ "Add author"." - " }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h1>Add author</h1>
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['method' => 'posts', 'url' => action('AuthorsController@store')]) !!}
                        @include('errors')


                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> 
                            <label for="name">Name</label> 
                            <input type="text" class="form-control" id='name' name="name" value="{{ old('name') }}" placeholder="Name">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                          <div class="form-group{{ $errors->has('resume') ? ' has-error' : '' }}"> 
                            <label for="Resume">Resume</label> 
                            <textarea class="form-control" id='resume' name='resume' placeholder="Resume">{{ old('resume') }} </textarea>
                            @if ($errors->has('resume'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('resume') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}"> <!-- Date input -->
                            <label class="control-label" for="date">Date</label>
                            <input class="form-control" id="date" name="date" value="{{ old('date') }}" placeholder="YYYY/MM/DD" type="text"/>
                            @if ($errors->has('date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                            @endif
                        </div>

                            <div class="form-group"> 
                            <div class="col-md-6"> 
                                <button type="submit" class="btn btn-primary">Add author</button>
                            </div> 
                        </div>  
                        {!! Form::close() !!}
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
      @endsection