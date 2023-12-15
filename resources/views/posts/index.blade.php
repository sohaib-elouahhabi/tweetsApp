@extends('layouts.app')

@section('content')
    <div class="container bg-white">
        <div class="align-content-center">
                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4 form-floating">
                        <textarea name="body" class="form-control mt-4
                        @error('body') border-danger @enderror"
                                  placeholder="Leave a post here"
                                  id="floatingTextarea2" style="height: 100px">
                        </textarea>
                        <label for="floatingTextarea2">Body</label>

                        @error('body')
                        <div class="text-danger mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
                @if($posts->count())

                    @foreach($posts as $post)
                        <div class="mb-4">
                            <a href="" class="font-bold">{{$post->user->name}}</a>
                            <span class="text-gray-600 text-sm"> {{$post->created_at->diffForHumans()}}</span>
                            <p class="mb-2">{{$post->body}}</p>
                        </div>
                    @endforeach
                @else
                    <p>There Are No Posts!!</p>
                @endif

        </div>
    </div>
@endsection
