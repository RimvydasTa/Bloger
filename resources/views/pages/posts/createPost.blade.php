@extends('main');
@section('title', 'Create new Post')

@section('content')
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8" style="min-height: 550px">
            <h1 class="text-center">Create New Post</h1>

            {!! Form::open(['route' => 'posts.store']) !!} <!-- Open form -->
               {{--Title input--}}
                {{ Form::label('title', "Title:") }}
                {{ Form::text('title', '', ['class' => 'form-control']) }}

                {{--Textarea--}}
                {{Form::label('body', 'Body:')}}
                {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Post body'])}}

                {{--Submit button--}}
                {{ Form::submit('Create new Post', ['class' => 'btn btn-lg btn-success btn-block', 'style' => 'margin-top:20px']) }}

            {!! Form::close() !!} <!-- End form -->
    </div>
    </div>
    @endsection