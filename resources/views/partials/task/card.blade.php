

<article class="flex-row list-group-item task-card-fr-fr" data-id="{{ $task->id }}" order="{{ $task->order_vertical }}">
  <header>
    <a href="{{ url('/task/' . $task->id) }}">
      <div class="task-container">
        <h2 class="task-name">
          {{ $task->name}}
        </h2>
      </div>
    </a>
    <!--<h3 class="task-description"> {{$task->description}} </h3>-->
  </header>
</article>
