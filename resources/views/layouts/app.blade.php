<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- @auth
    <meta name="user_id" content="{{ auth()->user()->id }}">
    @endauth --}}

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        {{-- @include('navigation-menu') --}}

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
            @if (auth()->user()->isadmin!=1)
            <div class="chat-box">
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
                                    ->where("to_msg",    $user)
                                    ->orWhere("from_msg",   $user)
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
            </div>
            @endif
        </main>
    </div>

    @stack('modals')


    @livewireScripts
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $('document').ready(function(){
            $('.chat-boxes').hide()
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

    {{-- <script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('96835553421a65e69daa', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script> --}}
{{--
    <script>
        window.intergramId = "1480507428"
    </script>
    <script id="intergram" type="text/javascript" src="https://www.intergram.xyz/js/widget.js"></script>

    <script>
        window.intergramId = "-436498390";
        window.intergramCustomizations = {
            titleClosed: 'Hi!',
            titleOpen: 'Live Chat Wicaksu',
            introMessage: 'Hai ada yang bisa kami bantu ?',
            autoResponse: 'Tunggu sebentar ya ?',
            autoNoResponse: 'Lama nunggu ?, Tenang aja meskipun kamu close web nya, chat kamu kagak bakal ilang kok !',
            mainColor: "#8d9e08", // Can be any css supported color 'red', 'rgb(255,87,34)', etc
            alwaysUseFloatingButton: false // Use the mobile floating button also on large screens
        };
    </script>
    <script id="intergram" type="text/javascript" src="https://www.intergram.xyz/js/widget.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}

</body>

</html>
