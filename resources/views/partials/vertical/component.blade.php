<link href="{{ asset('/css/board.css') }}" rel="stylesheet">
@if ($vertical->isdone)
    <article class="vertical completed">
@else
    <article class="vertical">
@endif
    <h2 id="vertical_name"> {{$vertical->name}} </h2>
    <a class="button" href="{{ url('/verticals/'. $vertical->id .'/add_task') }}"> Add task </a>
    <form action="/action/vertical/mark_completed" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="id" value="{{ $vertical->id }}">
        <input type="hidden" name="board_id" value="{{ $board->id }}">

        <button type="submit">Done</button>
    </form>
    <div class="tareas">
        @foreach ($vertical->tasks()->get() as $task)
            @include('partials.task.card',['task'=>$task])
        @endforeach
    </div>
</article>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js" defer></script>
<script src="/js/project/tasks-sortable.js" defer> </script>
