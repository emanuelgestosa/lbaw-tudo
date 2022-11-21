<article class="comment-component" id="{{$comment->id}}">
    <p>Sent: {{$comment->sent_date}}</p>
    <p>{{$comment->msg}}</p>
    <p>Sent By: {{$comment->user->first()->name}}</p>
</article>
