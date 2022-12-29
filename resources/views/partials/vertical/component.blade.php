<link href="{{ asset('/css/board.css') }}" rel="stylesheet">
<article class="vertical">
    <h2 id="vertical_name"> {{$vertical->name}} </h2>
    <a class="button" href="{{ url('/verticals/'. $vertical->id .'/add_task') }}"> Add task </a>
    <div class="tareas">
        @foreach ($vertical->tasks()->get() as $task)
            @include('partials.task.card',['task'=>$task])
        @endforeach
    </div>
</article>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js" defer></script>
<script src="/js/project/tasks-sortable.js" defer> </script>
