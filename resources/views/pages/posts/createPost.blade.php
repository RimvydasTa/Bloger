@extends('main');
@section('title', 'Create new Post')
@section('stylesheets')
    {{  Html::style('css/parsley.css')  }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8" style="min-height: 550px">
            <h1 class="text-center">Create New Post</h1>

            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!} <!-- Open form -->
               {{--Title input--}}
                {{ Form::label('title', "Title:") }}
                {{ Form::text('title', '', ['class' => 'form-control', 'required' => '', 'max-length' => '255']) }}

                {{--Textarea--}}
                {{Form::label('body', 'Body:')}}
                {{Form::textarea('body', '', ['class' => 'form-control','required' => '', 'placeholder' => 'Post body', 'max-length' => '500'])}}

                {{--Submit button--}}
                {{ Form::submit('Create new Post', ['class' => 'btn btn-lg btn-success btn-block', 'style' => 'margin-top:20px']) }}

            {!! Form::close() !!} <!-- End form -->
    </div>
    </div>
    @endsection

@section('scripts')
    {{ Html::script('js/parsley.min.js') }}
    @endsection