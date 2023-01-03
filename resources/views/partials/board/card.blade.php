  <article class="card" data-id="{{ $board->id }}">
    <div class="card-body">
    <a href="{{ url('/board/' . $board->id) }}">
      <h5 class="card-title text-truncate"> {{ $board->name }} </h5>
    </a>
    <a tabindex="0" href="{{ url('/board/' . $board->id) }}" class="btn btn-primary">See board</a>
    <!-- Meter aqui um link para o board-component -->
    </div>
  </article>
