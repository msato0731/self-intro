@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-6">
            {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'put'] )!!}
                <div class="form-group">
                    {!! Form::label('comment', 'Comment') !!}
                    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('Update', ['class' => 'btn btn-primary'])!!}
                
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection