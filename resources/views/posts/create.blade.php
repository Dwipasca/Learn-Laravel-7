@extends('layouts.app')

@section('content')
    
    
    
        <div class="col-md-6">
            
            <form action="/posts/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        {{-- <div class="mt-2 text-danger">
                            {{ $message}}
                        </div> --}}
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea id="body" name="body" class="form-control  @error('body') is-invalid @enderror" cols="30" rows="10"></textarea>
                    @error('body')
                        {{-- <div class="mt-2 text-danger">
                            {{ $message}}
                        </div> --}}
                        <div class="invalid-feedback">
                            {{ $message}}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            
        </div>
    

@endsection
