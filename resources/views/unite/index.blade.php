<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>ENG</title>


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

<body class="overflow-x-hidden">
  


    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg  w-screen h-26 fixed">
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
    
    <div class="pt-24">

      <center>
        <a href="unite/create">
          <button class="bg-[#F16B07] text-white p-3 w-24 rounded-full hover:bg-[#af540e] ">Create</button>

        </a>

      </center>
    </div>
    <center>

      <div class="relative overflow-x-auto mt-7 mb-7">
        <table class="w-3/4 text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                ID
              </th>
              <th scope="col" class="px-6 py-3">
                Unites
              </th>
              <th scope="col" class="px-6 py-3">
                Position
              </th>
              <th scope="col" class="px-6 py-3">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($unite as $value)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $value->id }}
              </th>
              <td class="px-6 py-4">
                {{ $value->name }}
              </td>
              <td class="px-6 py-4">
                {{ $value->Position }}
              </td>
              <td class="px-6 py-4">
                <div><a href="unite/show">
                    <button class="bg-red-500 p-2 text-sm text-white font-normal rounded-lg hover:bg-red-800">Modifier</button></div>

                </a>
              </td>

            </tr>
            @endforeach




            </tr>


          </tbody>
        </table>
      </div>
    </center>
    <div>


    </div>


</body>

</html>