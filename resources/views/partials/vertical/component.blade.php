<link href="{{ asset('/css/board.css') }}" rel="stylesheet">
<article class="vertical" >
    <h2 id="vertical_name"> {{$vertical->name}} </h2>
    <a class="button" href="{{ url('/verticals/'. $vertical->id .'/add_task') }}"> Add task </a>
    @foreach ($vertical->tasks()->get() as $task)
        @include('partials.task.card',['task'=>$task])
    @endforeach
</article>
