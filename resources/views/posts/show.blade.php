@extends('layouts.app')

@section('content')
    
    
    
        <div class="col-md-12">
            
            <div class="row">
                
               
                <div class="col-md-12">
                
                    <div class="card mb-3">
                        <div class="card-header">
                            {{$post->title}}
                        </div>
                        <div class="card-body">
                            {{ $post->body}}

                        </div>
                       
                    </div>
                </div>
               
                
            </div>    
        
            
        </div>
    

@endsection
