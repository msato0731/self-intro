@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-6">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put'] )!!}
                <div class="form-group">
                    {!! Form::label('profile', 'Profile') !!}
                    {!! Form::text('profile', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('Update', ['class' => 'btn btn-primary'])!!}
                
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection