<div style="flex-direction: column;" class="flex-column d-flex" style="overflow-y: auto; max-height: 100%;">
@if ($vertical->isdone)
    <article style="width: 200px; max-width:100%;  border: 1px solid black; border-radius: 20px; height: 500px; max-height: %; margin: 5px;"  class="  vertical completed list-group " data-id="{{ $vertical->id }}">
@else
    <article style="width: 200px; max-width:100%;  border: 1px solid black; border-radius: 20px; height: 500px; max-height: 100%; margin: 5px;"  class="  vertical " data-id="{{ $vertical->id }}">
@endif
    <h2 id="vertical_name"> {{$vertical->name}} 
        <a class="btn btn-primary" href="{{ url('/verticals/'. $vertical->id .'/add_task') }}" > <i class="fa fa-plus"></i> </a>
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
    </h2>
    <i class="fa-solid fa-question-circle help"></i>
    <div class="hide">Select/Unselect to set/unset column for completed tasks</div>
    <div class="tarefas list-group" style="max-height: 425px; overflow: scroll;" data-id="{{ $vertical->id }}">
        @foreach ($vertical->tasks->sortBy('order_vertical') as $task)
            @include('partials.task.card',['task'=>$task])
        @endforeach
    </div>
</article>
</div>
