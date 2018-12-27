@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>{{$profileUser->name}} <small>Since {{$profileUser->created_at->diffForHumans()}}</small></h1>
            </div>
            <div class="panel-body">
                @foreach($threads as $thread)
                    <article>
                        <div class="level">
                            <h4><a href="{{ $thread->path() }}">{{ $thread->title }}</a></h4>
                            <strong>{{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}</strong>
                        </div>
                    </article>
                    <hr>
                @endforeach
                {{$threads->links()}}
            </div>
        </div>
    </div>
@endsection