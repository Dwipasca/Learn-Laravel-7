@extends('layouts.app')

@section('content')
    
    
    
        <div class="col-md-6">
            
            <form action="/posts/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea id="body" name="body" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            
        </div>
    

@endsection
