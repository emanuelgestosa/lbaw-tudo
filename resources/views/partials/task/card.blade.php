<div class="task-card-fr-fr" data-id="{{ $task->id }}" order="{{ $task->order_vertical }}">
  <header>
    <a href="{{ url('/task/' . $task->id) }}">
      <div style="width: 200px; height: 40px; max-width: 100%; text: var(--dark); margin:0; border-radius:0;" class="list-group-item task-container text-truncate" title="{{ $task->name}}">
          {{ $task->name}}
      </div>
    </a>
    <!--<h3 class="task-description"> {{$task->description}} </h3>-->
  </header>
</div>
