@extends('main')

@section('title', ' All Posts')


@section('content')
        <div class="row">
            <div class="col-md-10">
                <h1>All Posts</h1>
            </div>
            <div class="col-md-2">
                {{ Html::linkRoute('posts.create', 'Create Post', '', ['class' => 'btn btn-lg btn-block btn-success btn-h1-spacing']) }}
            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div> <!-- End row -->

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created at</th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->title}}</td>
                      <td>{{ substr($post->body,0, 50)}} {{ strlen($post->body) > 50 ? "..." : "" }}</td>
                      <td>{{$post->created_at}}</td>
                      <td>
                          {{Html::linkRoute('posts.show', 'View Post', $post->id, ['class' => 'btn btn-s btn-primary'])}}
                          {{Html::linkRoute('posts.edit', 'Edit Post', $post->id, ['class' => 'btn btn-s btn-info'])}}
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{$posts->links()}}
                </div>

            </div>
        </div>





@endsection {{-- End content section--}}