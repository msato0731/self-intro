@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="media-object rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
                    </div>
                </div>
            </aside>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        Profile
                    </div>
                    <div class="card-body">
                        {!! $user->profile !!}
                    </div>
                    {!! link_to_route('users.edit', 'Edit', ['id' => $user->id], ['class' => 'btn btn-light btn-sm']) !!}
                </div>
                {!! Form::open(['route' => 'comments.store'])!!}
                    <div class="form-group mt-3">
                        {!! Form::textarea('comment', old('comment'), ['class' => 'form-control','rows' => '2']) !!}
                        {!! Form::hidden('user_id', $user->id) !!}
                        {!! Form::submit('Comment', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}

                @if (count($comments) > 0)
                    @include('comments.comments', ['comments' => $comments])
                @endif
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Self Intro</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection