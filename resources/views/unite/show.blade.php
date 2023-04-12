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

<body>
  <center>
    <div id="form-container">
      <div id="form-container">
        <button id="add-form-btn" class="bg-[#F16B07] rounded-xl w-max h-11 text-lg text-white hover:bg-[#a44a06] px-2 mb-4">Ajouter un autre formulaire</button>
      </div>

      <form id="global-form" action="{{route('journal.store')}}" method="POST">
        @csrf
        <div id="form-wrapper">
          <div class="flex justify-center items-center gap-6 mt-4">
            <select name="selectUnite[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-max p-3" hidden>
              <option value="{{ $unite->id }}" selected class="hidden">{{ $unite->id }}</option>
            </select>
            <select name="selectproduit[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-max p-3">
            @foreach($unite->produit as $value)
    <option value="{{ $value->id }}">{{ $value->name }}</option>
@endforeach
            </select>
            <input type="text" name="Production[]" class="bg-[#f4c6a2] rounded-xl w-max h-11 text-lg p-4" placeholder="Production">
            <input type="text" name="Vent[]" class="bg-[#f4c6a2] rounded-xl w-max h-11 text-lg p-4" placeholder="Vent">
            <input type="text" name="Production_Vendue[]" class="bg-[#f4c6a2] rounded-xl w-max h-11 text-lg p-4" placeholder="Production_Vendue">
            <button type="button" class="remove-row-btn bg-red-500 rounded-xl w-max h-11 text-lg text-white hover:bg-red-700 px-2">Supprimer</button>
          </div>
        </div>

        <div class="flex justify-center items-center gap-6 mt-4">
          <button type="button" id="submit-all" class="bg-[#F16B07] rounded-xl w-2/4 h-11  text-lg text-white hover:bg-[#a44a06]">Submit All</button>
        </div>
      </form>


  </center>
  </div>
  </div>
  </center>
  <script>
    const formContainer = document.querySelector('#form-container');
    const addFormBtn = document.querySelector('#add-form-btn');
    const formWrapper = document.querySelector('#form-wrapper');
    const globalForm = document.querySelector('#global-form');
    const submitAllBtn = document.querySelector('#submit-all');

    let formCounter = 1;

    // Add event listener for adding new form elements
    addFormBtn.addEventListener('click', () => {
      const newForm = `
    <div id="form-wrapper">
        <div class="flex justify-center items-center gap-6 mt-4">
        <select name="selectUnite[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-max p-3" hidden>
              <option value="{{ $unite->id }}" selected class="hidden">{{ $unite->id }}</option>
            </select>
            <select name="selectproduit[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-max p-3">
                @foreach($produit as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
            <input type="text" name="Production[]" class="bg-[#f4c6a2] rounded-xl w-max h-11 text-lg p-4" placeholder="Production" >
            <input type="text" name="Vent[]" class="bg-[#f4c6a2] rounded-xl w-max h-11 text-lg p-4" placeholder="Vent">
            <input type="text" name="Production_Vendue[]" class="bg-[#f4c6a2] rounded-xl w-max h-11 text-lg p-4" placeholder="Production_Vendue">
            <button type="button" class="remove-row-btn bg-red-500 rounded-xl w-max h-11 text-lg text-white hover:bg-red-700 px-2">Supprimer</button>
        </div>
    </div>

    `;
      formCounter++;
      formWrapper.insertAdjacentHTML('beforeend', newForm);
    });

    // Add event listener for submitting the form
    submitAllBtn.addEventListener('click', () => {
      globalForm.submit();
    });
    // Ajoute un écouteur d'événement click à tous les boutons "Supprimer"
    formWrapper.addEventListener('click', (e) => {
      if (e.target.classList.contains('remove-row-btn')) {
        e.target.closest('.flex').remove();
      }
    });
  </script>

</body>

</html>