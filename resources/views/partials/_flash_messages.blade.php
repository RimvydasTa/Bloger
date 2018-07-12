@if(session()->has('success'))
    <div class="alert alert-success">
        <strong>Success</strong>
        {{session()->get('success')}}
    </div>
    @endif

@if(count($errors->all()) > 0)
    <div class="alert alert-danger">
        <strong>Errors:</strong>
        <ul>
    @foreach($errors->all() as $error)
          <li>  {{ $error }} </li>
        @endforeach
        </ul>
    </div>
    @endif

