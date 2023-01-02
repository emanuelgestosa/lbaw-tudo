@if ($vertical->isdone)
    <article class="vertical completed list-group" data-id="{{ $vertical->id }}">
@else
    <article class="vertical list-group" data-id="{{ $vertical->id }}">
@endif
    <h2 id="vertical_name"> {{$vertical->name}} </h2>
    <a class="button" href="{{ url('/verticals/'. $vertical->id .'/add_task') }}"> Add task </a>
    <form action="/action/vertical/mark_completed" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="hidden" name="id" value="{{ $vertical->id }}">
        <input type="hidden" name="board_id" value="{{ $board->id }}">
        
        @if ($vertical->isdone)
            <input type="checkbox" onChange="this.form.submit()" checked>
        @else
            <input type="checkbox" onChange="this.form.submit()">
        @endif
    </form>
    <i class="fa-solid fa-question-circle help"></i>
    <div class="hide">Select/Unselect to set/unset column for completed tasks</div>
    <div class="tarefas" data-id="{{ $vertical->id }}">
        @foreach ($vertical->tasks->sortBy('order_vertical') as $task)
            @include('partials.task.card',['task'=>$task])
        @endforeach
    </div>
</article>
