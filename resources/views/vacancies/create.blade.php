@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('nav')
	@include('partials.navBar-admin')

@endsection

@section('content')

<div class="flex flex-wrap justify-center">
    
    <div class="w-full max-w-sm">
        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

            <div class="font-semibold bg-gray-300 text-gray-700 py-3 px-6 mb-0">
                Nueva vacante
            </div>

            <form class="w-full p-6" method="POST" action="{{ route('vacancies.store') }}">
                @csrf

                <div class="flex flex-wrap mb-6">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                        Título vacante:
                    </label>

                    <input id="name" type="text" class="form-input w-full bg-gray-200 p-2 rounded @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-wrap mb-6">
                    <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Categoría:
                    </label>

                    <select id="category_id" name="category_id" 
                    	class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-200">
                    	<option value="">Selecciona</option>
                    	@foreach ($categories as $category)
                    		<option value="{{ $category->id }}">{{ $category->name }}</option>
                    	@endforeach
                    </select>

                    @error('category_id')
                        <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-wrap mb-6">
                    <label for="experience_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Experiencia:
                    </label>

                    <select id="experience_id" name="experience_id" 
                    	class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-200">
                    	<option value="">Selecciona</option>
                    	@foreach ($experiences as $experience)
                    		<option value="{{ $experience->id }}">{{ $experience->name }}</option>
                    	@endforeach
                    </select>

                    @error('experience_id')
                        <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                <div class="flex flex-wrap mb-6">
                    <label for="location_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Ubicación:
                    </label>

                    <select id="location_id" name="location_id" 
                        class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-200">
                        <option value="">Selecciona</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>

                    @error('location_id')
                        <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-wrap mb-6">
                    <label for="salary_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Salario:
                    </label>

                    <select id="salary_id" name="salary_id" 
                        class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-200">
                        <option value="">Selecciona</option>
                        @foreach ($salaries as $salary)
                            <option value="{{ $salary->id }}">{{ $salary->name }}</option>
                        @endforeach
                    </select>

                    @error('salary_id')
                        <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex flex-wrap mb-6">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                        Descripción del puesto:
                    </label>

                    <div class="editable form-input w-full bg-gray-200 p-2 rounded">
                    </div>

                    <input type="hidden" name="description" id="description">

                    @error('description')
                        <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

{{--                 <div class="flex flex-wrap mb-6">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                        Imagenes del puesto:
                    </label>

                    <div id="dropzone" class="dropzone form-input w-full bg-gray-200 p-2 rounded">
                    </div>

                    <input type="hidden" name="image" id="image" />

                    <p id="error"></p>
                </div> --}}


{{--                 <div class="flex flex-wrap mb-6">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                        Imagenes del puesto:
                    </label>
                    <div class="dropzone form-input w-full bg-gray-200 p-2 rounded"></div>
                </div> --}}

                <div class="flex flex-wrap mb-6">
                    <label for="skills" class="block text-gray-700 text-sm font-bold mb-2">
                        Hábilidades:
                    </label>

                    @{{-- php
                        $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
                    @endphp

                    <list-skills :skills="{{ json_encode($skills) }}">
                    </list-skills> --}}
                </div>

                <div class="flex flex-wrap items-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Guardar
                    </button>

                </div>
            </form>

        </div>
    </div>

</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>

    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () => {

            // Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'h2', 'h3', 'pre'],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Información de la vacante'
                }
            });

            editor.subscribe('editableInput', function(eventObj, editable) {
                const contenido = editor.getContent();
                document.querySelector('#description').value = contenido;
            });


            // let myDropzone = new Dropzone('.dropzone', {
            //     // url: '/vacantes/image',
            //     url: '/vacantes/image',
            //     acceptedFiles: 'image/*',
            //     paramName: 'photo', // Cambia el nombre file a photo
            //     maxFilesize: 2,
            //     addRemoveLinks: true,
            //     headers: {
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //     },
            //     dictDefaultMessage: 'Arrastra aquí tus images',
            // });

            // myDropzone.on('success', function(file, res) {
            //     console.log(file);
            // });

            // myDropzone.on('error', function(file, res) {
            //     console.log(res);
            //     // let msg = res.photo[0];
            //     // $('.dz-error-message:last > span').text(msg);
            // });

            
///////////////////////////////////////////////////////////////
            // Dropzone
            // let dropzone = new Dropzone('.dropzone', {
            //     url: '/vacantes/image',
            //     acceptedFiles: 'image/*',
            //     paramName: 'photo',
            //     maxFilesize: 1,
            //     maxFile: 1,
            //     addRemoveLinks: true,
            //     dictRemoveFile: 'Borrar',
            //     headers: {
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //     },
            //     dictDefaultMessage: 'Arrastra aquí tus images',

            //     success: function(file, response) {
            //         // console.log('success', file.dataURL);
            //         console.log(response.correcto);
            //         document.querySelector('#error').textContent = '';

            //         // Coloca la respuesta en el servidor - input hidden
            //         document.querySelector('#image').value = response.correcto;

            //         // Añadir al objeto de archivo el nombre del servidor
            //         file.nombreServidor = response.correcto;


            //     },
            //     error: function(file, response) {
            //         // console.log('error',file);
            //         // console.log(response);
            //         document.querySelector('#error').textContent = 'Formato no válido.';
            //     },
            //     maxfilesexceeded: function(file) {
            //         console.log('error max',file);
            //         if (this.files[1] != null) {
            //             this.removeFile(this.files[0]); // Delete file anterior
            //             this.addFile(file); // add new file
            //         }
            //     },
            //     removeFile: function(file, response) {
            //         console.log(file);
            //         console.log(response);

            //         params = {
            //             image : file.nombreServidor
            //         };

            //         axios.post('/vacantes/deleteimage', params)
            //             .then(res => {
            //                 console.log(res);
            //             })
            //     }
            // })
        });
    </script>


@endsection