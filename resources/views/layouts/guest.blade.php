<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>
