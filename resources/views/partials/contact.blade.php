<aside class="md:w-2/5 bg-teal-500 p-2 rounded m-3">
	<h2 class="text-lg my-5 text-white uppercase font-bold text-center">Contacta al reclutador</h2>

	<form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		
        <div class="flex flex-wrap mb-6">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('Name') }}:
            </label>

            <input id="name" type="text" class="form-input w-full bg-gray-200 p-2 rounded @error('name')  border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Tu nombre...">

            @error('name')
                <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="flex flex-wrap mb-6">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                {{ __('E-Mail Address') }}:
            </label>

            <input id="email" type="email" class="form-input w-full bg-gray-200 p-2 rounded @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Tu correo...">

            @error('email')
                <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="flex flex-wrap mb-6">
            <label for="cv" class="block text-gray-700 text-sm font-bold mb-2">
                Curriculum (PDF):
            </label>

            <input id="cv" type="file"
            	class="form-input w-full p-2 rounded @error('cv')  border-red-500 @enderror"
            	name="cv"
            	required
            	accept="application/pdf" 
            >

            @error('cv')
                <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">

        <button type="submit" class="inline-block align-middle text-center w-full select-none  font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-teal-700 hover:bg-teal-900">
            Contactar
        </button>
	</form>
</aside>