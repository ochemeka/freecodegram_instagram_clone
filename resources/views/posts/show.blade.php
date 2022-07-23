@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
                <div class="col-8">
                        <img src="/storage/{{ $post->image }}"  class="w-100" />
                </div>
                <div class="col-4">
                     <div>  
                     <div class="d-flex align-items-center">
                                        <div class="pr-3">
                                            <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-50"   style="max-width: 60px;"  /> 
                                        </div>
                                        <div class="font-weight-bold">
                                             <div class="text-dark"><a href="/profile/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }} </span>  </a>  </div>
                                        </div>
                                        <a href="#" class="pl-3">Follow</a>
                        </div>

                        <hr>


                        <p>
                                <span class="font-weight-bold">
                                        <a href="/profile/{{ $post->user->id }}">
                                                <span class="text-dark">  {{ $post->user->username }} 
                                                </span> 
                                        </a> 
                                </span>  {{ $post->caption }}
                        </p>
                      </div>
                </div>
        </div>
</div>
@endsection
