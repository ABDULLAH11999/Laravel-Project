    @include('home.header')

    @include('home.slider')
      
     @include('home.why')
      
     @include('home.arrival')
      
     @include('home.product')


<!-- comment and reply code -->

<div style=" text-align:center;">
    <h1 style=" font-weight:bold; font-size:45px; text-align:center; padding-top:20px; padding-bottom:20px">Comments</h1>
   <form method="post" action="{{url('add_comment')}}">
    @csrf
    <textarea name="comment" style="height:150px; width:600px; text-align:center;" placeholder="Comment something here..."></textarea>
    <br>
    <input type="submit"  value="comment" class="btn btn-primary">
    </form>
</div>
<div style="padding-left:15%;">
<h1 style="font-size:35px;  padding-top:10px; padding-bottom:10px">All Comments</h1>
</div>

<!-- Reply -->

@foreach($comment as $comment)
<div style="padding-left:15%;">
    <b>{{$comment->name}}</b>
    <p>{{$comment->comment}}</p>
    <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
    @foreach($reply as $rep)
    @if($rep->comment_id==$comment->id)
    <div style="padding-left:3%; padding-bottom:5px; padding-top:3px;">
<b><i>{{$rep->name}}</i></b>
<p><i>{{$rep->reply}}</i></p>
<a style="color:blue;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
</div>
@endif
@endforeach
</div>
@endforeach

<div style="display:none; padding-left:15%" class="replyDiv">
<form action="{{url('add_reply')}}" method="post">
@csrf
<input type="text" id="commentId" name="commentId" hidden="">
    <textarea name="reply" style="width:500px; height:100px;" placeholder="Write something here"></textarea>
    <br>
<button type="submit" class="btn btn-outline-warning ">Reply</button>
    <a href="javascript::void(0)" class="btn" onclick="reply_close(this)">Close</a>
</div>
</form>

<script type="text/javascript">
    function reply(caller){
        document.getElementById('commentId').value=$(caller).attr('data-Commentid');
$('.replyDiv').insertAfter($(caller));
$('.replyDiv').show();
    }
    function reply_close(caller){
        $('.replyDiv').hide();
    }
</script>
<script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
<!-- comment and reply code end -->

      @include('home.sub')

     @include('home.client')
     
     @include('home.footer')
