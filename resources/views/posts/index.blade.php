@extends('template')

@section('content')
<h1>Posts</h1>

@if($errors->any())

  <ul class="alert">
    @foreach($errors->all() as $error)
      <li> {{ $error }} </li>
    @endforeach
  </ul>
@endif


{!! Form::open(['route'=> 'blog.store', 'method'=>'post']) !!}


@include('posts._form')

<div class='form-group'>
    {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}
<!--
  <div class='form-group'>
    <label for='name-id'>Form Title</label>
    <input type='text' class='form-control input-lg' name="nome" placeholder='' >
  </div> -->





<table class='table'>
  <thead>
    <tr>
      <th>Titulo</th>
      <th>Conteudo</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <td>{{ $post->title}}</td>
      <td>{{ $post->content}}</td>
      <td> <a class="btn btn-primary" href="{{ route('blog.edit', ['id'=>$post->id]) }}">Edit</a></td>
      <td> <a class="btn btn-danger" href="{{ route('blog.destroy', ['id'=>$post->id]) }}">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $posts->render()}}

@endsection
