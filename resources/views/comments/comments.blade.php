<ul class="media-list">
    @foreach ($comments as $comment)
        <li class="media mb-3">
            <img class="media-object rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            <div class="media-body ml-3">
                <div>
                    {!! link_to_route('users.show', $comment->user->name, ['id' => $comment->user->id]) !!} <span class="text-muted">posted at {{ $comment->created_at }}</span>
                </div>
                <div>
                    <p>{!! nl2br(e($comment->comment)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $comment->user_id)
                        {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $comments->render('pagination::bootstrap-4') }}