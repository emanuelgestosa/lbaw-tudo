<article class="task-component" data-id="{{ $task->id }}">
<header>
  <h2 class="task-name"> {{ $task->name}} </h2>
  <h3 class="task-description"> {{$task->description}} </h3>
</header>
<section class="label-container">
        @foreach ($task->labels()->get() as $label)
           @include('partials.label.tag',['label'=>$label])
        @endforeach
</section>
<section class="comment-container">
        @foreach ($task->comments()->get() as $comment)
           @include('partials.comment.component',['comment'=>$comment])
        @endforeach
</section>
</article>
