<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="height: ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-2">
              <div class="row">
                  <div class="col-md-1"></div>
                <div class="col-md-2 pl-2" style="overflow-y:scroll; height:400px;">
                    @foreach ($user as $item)
                        <div class="row pl-2">
                            <button class="btn btn-success pt-2 py-2 mt-2 person_msg" id="person_msg" data-id_user="{{ $item->id }}">{{$item->name}}</button>
                        </div>
                    @endforeach
                </div>
            <div class="col-md-9">
               <div id="msg-box">
                    Pilih kontak
                </div>
               </div>
              </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('.person_msg').on('click',function(){
            var id = $(this).data('id_user')

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
        })

    </script>

</x-app-layout>
