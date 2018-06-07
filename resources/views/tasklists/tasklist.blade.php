<ul class="media-list">
@foreach ($tasklists as $tasklist)
    <?php $user = $tasklist->user; ?>
    <li class="media">
        <div class="media-left">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $tasklist->created_at }}</span>
            </div>
            <div>
                <p>タスク：{!! nl2br(e($tasklist->content)) !!}</p>
            </div>
            <div>
                <p>進捗度：{!! nl2br(e($tasklist->status)) !!}</p>
            </div>
            <div>
                @if (Auth::user()->id == $tasklist->user_id)
                    {!! Form::open(['route' => ['tasklists.destroy', $tasklist->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                     {!! link_to_route('tasklists.edit', 'update', ['id' => $tasklist->id], ['class' => 'btn btn-success']) !!} 
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $tasklists->render() !!}