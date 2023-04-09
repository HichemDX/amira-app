<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>DoubleClick</title>


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  <style>
    body {
      font-family: 'Lato', sans-serif;
    }
  </style>
  <!-- Scripts -->
  @vite( 'resources/js/app.js')
</head>

<body class="">
  <div id="app">

    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg  w-screen h-26">
      <div class="max-w-screen-xl flex  items-center justify-between mx-auto p-4">
        <div>
          <a href="/" class="flex items-center gap-2">
            <img src="{{ asset('images/logo.jpg') }}" alt="#" class="h-10 w-10 rounded-lg ">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ENG</span>
          </a>
        </div>
        <div class="pl-28">
          {{ Auth::user()->name }}
        </div>

        <div>
          <ul class="flex  justify-center items-center gap-4">
            <li>
              <a href="/home" class="block py-2 pl-3 pr-4 text-[#F16B07]  rounded " aria-current="page">Home</a>
            </li>

            <li>
              <a href="/unite" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:text-[#af540e]    ">Unités</a>
            </li>
            <li>
              <a href="/produit" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:text-[#af540e]  ">Produit</a>
            </li>
            <li>
              <a href="#" class=" pr-4 text-gray-900 rounded hover:bg-[#af540e]">
                <a class=" bg-[#F16B07] text-white p-2 pr-4 pl-4 rounded-full hover:bg-[#af540e]" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                  @csrf
                </form>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>



    <center>

      <div class="relative overflow-x-auto mt-16">
        <table class="w-3/4 text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                ID
              </th>
              <th scope="col" class="px-6 py-3">
                Produit
              </th>
              <th scope="col" class="px-6 py-3">
                Uinters
              </th>
              <th scope="col" class="px-6 py-3">
                Action
              </th>
            </tr>
          </thead>
          <tbody>






            @foreach($produit as $produit)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $produit->id }}
              </th>
              <td class="px-6 py-4">
                {{ $produit->name }}
              </td>
              <td class="px-6 py-4">
                <!-- Dropdown menu -->
                <select name="unite" id="unite" class="w-24 border-none focus:border-[#F16B07] py-2 bg-[#eec3a3] focus:outline-none rounded-md border-2 text-bl">
                  @foreach($produit->unite as $unite)
                  <option value="{{ $unite->id }}">{{ $unite->name }}</option>
                  @endforeach
                </select>


              </td>
              <td class="px-6 py-4">
                <div><button class="bg-red-500 p-2 text-sm text-white font-normal rounded-lg hover:bg-red-800">Modifier</button></div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </center>

    <div>
    </div>
  </div>

</body>

</html>