@extends('layouts.app')

@section('content')
    
    
    
<div class="col-md-12">
        <div class="d-flex justify-content-between">
            <div>
                <h4>All Post</h4>
                <hr>
            </div> 
            <div>
                <a href="/posts/create" class="btn btn-primary">Add Post </a>
            </div>    
        </div>    
        @if (session()->has('success'))  
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>      
        @endif 
            <div class="row">
                
                @forelse ($posts as $post)
                    
                    <div class="col-md-6">             
                        <div class="card mb-3">
                            <div class="card-header">
                                {{$post->title}}
                            </div>
                            <div class="card-body">
                                <div>
                                    {{ Str::limit($post->body, 100)}}
                                    {{-- {{ $post->body}} --}}
                                    <br><br>
                                </div>
                                <a href="/posts/{{ $post->slug }}">Read More</a>
                                
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                {{-- Publish On {{ $post->created_at->format('d M, Y')}} --}}
                                Publish On {{ $post->created_at->diffForHumans()}}
                                <a href="/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
                            </div>
                        </div>
                    </div>

                @empty
                
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            there no post here
                        </div>
                    </div>

                @endforelse ($posts as $post)
                
            </div>    

            <div class="d-flex justify-content-center">

                {{$posts->links()}}
            </div>

            
        </div>
    

@endsection
