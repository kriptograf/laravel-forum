@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#">{{ $thread->creator->name }}</a> posted:
                        {{ $thread->title }}
                    </div>

                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach

                {{ $replies->links() }}
            </div>
        </div>

        @if(auth()->check())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="post" action="{{ $thread->path() }}/replies">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Send" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
        @else
            <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> for add reply in forum.</p>
        @endif

    </div>
@endsection