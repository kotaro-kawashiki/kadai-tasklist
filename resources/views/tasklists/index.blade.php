@extends('layouts.app')

@section('content')

 <h1>Tasklists made by Taroshiki</h1>
   @if (count($tasklists) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasklists as $tasklist)
                    <tr>
                        <td>{!! link_to_route('tasklists.show', $tasklist->id, ['id' => $tasklist->id]) !!}</td>
                        <td>{{ $tasklist->status }}</td>
                        <td>{{ $tasklist->content }}</td>
                    </tr>
                @endforeach
            </tbody>
          <?php
          $c = 0;
          foreach($tasklists as $tasklist){
              $c = $c + $tasklist->id;
          }
            ?>
            ID合計値:  {{$c}}
            
        </table>
    @endif
  {!! link_to_route('tasklists.create', '新規メッセージの投稿', null, ['class' => 'btn btn-primary']) !!}
@endsection