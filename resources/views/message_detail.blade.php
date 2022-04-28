
    <div style="overflow-y:scroll; height:400px;">
        @php
        $user=DB::table('users')->where('isadmin',1)->first()->id
        @endphp
        @foreach ($data as $item)
        @if ($item->from_msg == $user)
        {{-- dari user --}}
        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">{{DB::table('users')->where('id',$item->from_msg)->first()->name}}</h4>
            <p>{{$item->message}}</p>
        </div>
        @elseif($item->from_msg != $user )
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"> {{ DB::table('users')->where('id',$item->from_msg)->first()->name}}</h4>
            <p>{{$item->message}}</p>
        </div>
        @endif
        @endforeach
        {{-- dari admin --}}
    </div>
    {{-- <form class="submit_message"> --}}
            <div class="row">
                 <div class="col-md-10">
                     <input type="text" class="form-control my-4" name="message" id="">
                     <input type="hidden" class="form-control my-4" name="id_user" id="" value="{{ $id }}">
                 </div>
                 <div class="col-md-1">
                     <button class="btn btn-primary my-4 send-messages">Kirim</button>
                 </div>
            </div>
    {{-- </form> --}}
</div>
<script>
    $('.send-messages').on('click',function(e){

      e.preventDefault()
      let msg = $('[name=message]').val();
      let id = $('[name=id_user]').val();
      console.log(msg+id);
       $.ajax({
        url: "{{route('send_message')}}",
        type:"POST",
        data:{
            "_token": "{{ csrf_token() }}",
            message:msg,
            id_user:id,
        },
        success:function(response){
            $.ajax({
                url:"{{ route('show_msg') }}",
                method:"GET",
                data:{
                    id:id
                },
                success: function(data){
                    $("#msg-box").html(data)
                }
            })
        },
    })
    })
</script>
