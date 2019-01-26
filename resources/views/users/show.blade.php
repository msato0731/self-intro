@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="media-object rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
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
                @if (Auth::id() == $user->id)
                    {!! link_to_route('users.edit', 'Edit', ['id' => $user->id], ['class' => 'btn btn-primary btn-sm']) !!}
                @endif
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
@endsection