<h2 class="my-10 text-xl text-gray-700">
	Busca una vacante
</h2>

<form action="{{ route('vacancies.search') }}" method="POST">
	@csrf
	
	<div class="flex flex-wrap -mx-3 mb-4">
	    <div class="w-full px-3 mb-6 md:mb-0">
			<label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">
	            Categoría:
	        </label>

	        <select id="category_id" name="category_id" 
	        	class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight w-full focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-200">
	        	<option value="">Selecciona</option>
	        	@foreach ($categories as $category)
	        		<option value="{{ $category->id }}"
	                    >
	                    {{ $category->name }}
	                </option>
	        	@endforeach
	        </select>

	        @error('category_id')
	            <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
	                {{ $message }}
	            </p>
	        @enderror
	    </div>
	</div>

	<div class="flex flex-wrap -mx-3 mb-8 ">
	    <div class="w-full px-3 mb-6 md:mb-0">
	        <label for="location_id" class="block text-gray-700 text-sm font-bold mb-2">
	            Ubicación:
	        </label>

	        <select id="location_id" name="location_id" 
	            class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-200">
	            <option value="">Selecciona</option>
	            @foreach ($locations as $location)
	                <option value="{{ $location->id }}"
	                	
	                	>
	                	{{ $location->name }}
	                </option>
	            @endforeach
	        </select>

	        @error('location_id')
	            <p class="bg-red-100 border-l-4 border-red-500 p-4 w-full text-red-500 text-xs italic mt-1">
	                {{ $message }}
	            </p>
	        @enderror
	    </div>
	</div>

	<div class="flex flex-wrap items-center">
	    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-4 px-4 rounded focus:outline-none focus:shadow-outline">
	        Buscar vacantes
	    </button>

	</div>

</form>