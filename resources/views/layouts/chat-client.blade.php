<div class="chat-boxes">
    <div style="position: fixed; max-width:400px;right:10px;bottom:50px">
        <div class="card shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9"></div>
                    <button class="col-md-3 btn btn-danger closed-msg" >Tutup</button>
                </div>
            </div>
            <div class="card-body">
                <div style="overflow-y:scroll; height:400px;" class="cht">
                    @php
                        $user=DB::table('users')->where('isadmin',1)->first()->id
                    @endphp
                    @foreach (DB::table('pesan')
                    ->where("from_msg", auth()->user()->id)
                    ->where("to_msg", $user)
                    ->orWhere("from_msg",$user)
                    ->where("to_msg",  auth()->user()->id)
                    ->orderBy('created_at','desc')->get() as $item)
                    @if ($item->from_msg == 3)
                    <div class="alert alert-primary" role="alert">
                        <h4 class="alert-heading">Admin</h4>
                        <p>{{$item->message}}</p>
                    </div>
                    @elseif ($item->from_msg != 3)
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">{{auth()->user()->name}}</h4>
                        <p>{{$item->message}}</p>
                    </div>
                    @endif
                    @endforeach

                </div>
               <div class="row">
                <div class="col-md-8">
                    <input type="text" class="form-control my-4" name="msg" id="">
                    <input type="hidden" class="form-control my-4" name="id_users" id="" value="{{ auth()->user()->id }}">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary my-4 message-button">Kirim</button>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-primary show-chat" style="position: fixed; max-width:400px;right:50px; bottom:50px">Pesan</button>


<script>
    $('document').ready(function(){
        $('.show-chat').hide()
        $(".show-chat").on('click',function(e){
            $('.chat-boxes').show()
            $('.show-chat').hide();
        })
        $(".closed-msg").on('click',function(e){
           $('.chat-boxes').hide()
           $('.show-chat').show();
        })
});
</script>
<script>
    $('.message-button').on('click',function(e){
      e.preventDefault()
      let msg = $('[name=msg]').val();
      let id = $('[name=id_users]').val();
      console.log(msg+id);
       $.ajax({
        url: "{{route('message_client')}}",
        type:"POST",
        data:{
            "_token": "{{ csrf_token() }}",
            message:msg,
            id_user:id,
        },
        success:function(response){
          $('.chat-box').load("{{ route('chat_client') }}")
        },
    })
    })
</script>
