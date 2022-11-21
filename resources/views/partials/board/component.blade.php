<article class="board" id="{{$board->id}}">
    @foreach ($board->verticals()->get as $vertical)
        @include('partials.vertical.component',['vertical',$vertical])
    @endforeach
</article>
