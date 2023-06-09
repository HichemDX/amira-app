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
    <div class=" mt-20">
      <center>
        <form action="{{route('unite.store')}}" method="post" id="create-form">
          @csrf
          <div>
            <label for="name_unite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of Unite</label>
            <input type="text" id="name_unite" name="name_unite" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-2/4 p-2.5 " placeholder="Name of unite" required>
          </div>
          <br>
          <div>
            <label for="poidtion_unite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position of Unite</label>
            <input type="text" id="poidtion_unite" name="poidtion_unite" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-2/4 p-2.5 " placeholder="Position of unite" required>
          </div>
          <br>
          <!-- multi select -->
          <label for="poidtion_unite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position of Unite</label>

          <select name="selectproduit[]" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-2/4 p-3 " multiple>

            @foreach($produit as $produit)
            <option value="{{ $produit->id }}">{{ $produit->name }}</option>
            @endforeach
          </select>

          <!-- end multi select -->
          <div class="mt-10">
          <button type="submit" id="create-button" class="p-3 bg-[#F16B07] hover:bg-[#af540e] rounded-full w-44">Create</button>
          </div>
        </form>
      </center>
      <div>

      </div>

<script>
  const createButton = document.getElementById('create-button');
  createButton.addEventListener('click', validateForm);

  function validateForm(event) {
    const form = document.getElementById('create-form');
    const selectedProducts = form['selectproduit[]'].selectedOptions;

    if (selectedProducts.length === 0) {
      alert('Please select at least one product.');
      event.preventDefault();
    }
  }
</script>
</body>

</html>