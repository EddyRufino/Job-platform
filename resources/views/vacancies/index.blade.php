@extends('layouts.app')

@section('nav')
	@include('partials.navBar-admin')
@endsection


@section('content')
	<h1 class="text-2xl text-center text-gray-700">Administrar vacantes</h1>

<div class="flex flex-col mt-10">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
          <thead class="bg-gray-100 ">
            <tr>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Titulo Vacante
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Estado
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                Candidatos
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                  Acciones
              </th>
            </tr>
          </thead>
          <tbody class="bg-white">

            @forelse ($vacancies as $vacancy)
            <tr>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <div class="flex items-center">

                  <div class="ml-4">
                    <div class="text-sm leading-5 font-medium text-gray-900">{{ $vacancy->name }}</div>
                    <div class="text-sm leading-5 text-gray-500">Categoria:  {{ $vacancy->category->name }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                {{ $vacancy->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}
                "
                >
                {{ $vacancy->active ? 'Activo' : 'Desactivado' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                  <a 
                      href="" 
                      class="text-gray-500 hover:text-gray-600"
                  >   Candidatos</a>
              </td>
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                    <a href="#" class="text-teal-600 hover:text-teal-900 mr-5">Editar</a>
                    <a href="#" class="text-red-600 hover:text-red-900  mr-5">Eliminar</a>
                    <a href="" class="text-blue-600 hover:text-blue-900">Ver</a>
              </td>
            </tr>
            @empty
              <p class="text-xl text-center text-gray-900">Ingresa tus vacantes</p>
            @endforelse

           
          </tbody>
        </table>
      </div>
      {{ $vacancies->links() }}
    </div>
  </div>
@endsection

@section('scripts')
	<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
        event.preventDefault()
        toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
        isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
        toggleModal()
      }
    };
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
  </script>
@endsection