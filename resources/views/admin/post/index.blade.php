@extends('layouts.admin')
@section('content')
    <div>
        <div>
            <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Add post</a>
          </div>
          @foreach($posts as $post)
            <div><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></div>
          @endforeach
          <div class="mt-3">
            {{ $posts->appends($_GET)->links() }}
          </div>
    </div>
@endsection