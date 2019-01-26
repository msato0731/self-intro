<ul class="media-list">
    @foreach ($comments as $comment)
        <li class="media mb-3">
            <img class="media-object rounded" src="{{ Gravatar::src($comment->comment_user_email(), 50) }}" alt="">
            <div class="media-body ml-3">
                <div>
                    {!! link_to_route('users.show', $comment->comment_user_name(), ['id' => $comment->comment_user_id()]) !!} <span class="text-muted">posted at {{ $comment->created_at }}</span>
                </div>
                <div>
                    <p>{!! nl2br(e($comment->comment)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $comment->comment_user_id())
                        <div class="btn-group" role="group" aria-label="comment_button">
                            {!! link_to_route('comments.edit', 'Edit', ['id' => $comment->id], ['class' => 'btn btn-light btn-sm']) !!}
    
                            {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close()!!}
                        </div>    
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $comments->render('pagination::bootstrap-4') }}