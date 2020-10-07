@extends('layouts.app')

@section('content')
    
    <div class="col-md-6">
        
        <form action="/posts/{{$post->slug}}/edit" method="POST">
            {{-- @method('PATCH') --}}
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') ?? $post->title}}" id="title"  class="form-control">
                @error('title')
                    <div class="mt-2 text-danger">
                        {{ $message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea id="body" name="body" class="form-control" cols="30" rows="10">{{ old('body') ?? $post->body}}</textarea>
                @error('body')
                    <div class="mt-2 text-danger">
                        {{ $message}}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        
    </div>
    
@endsection
