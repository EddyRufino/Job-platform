        <ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($vacancies as $vacancy)
                <li class="p-10 border border-gray-300 bg-white shadow">
                    <h2 class="text-xl font-bold text-gray-700">
                        {{ $vacancy->name }}
                    </h2>

                    <p class="block text-gray-700 font-normal my-2">
                        {{ $vacancy->category->name }}
                    </p>

                    <p class="block text-gray-700 font-normal my-2">
                        Ubicación:
                        <span class="font-bold">{{ $vacancy->category->name }}</span>
                    </p>

                    <a href="{{ route('vacancies.show', $vacancy) }}"
                        class="bg-teal-500 inline-block text-gray-100 mt-2 px-4 py-2 rounded font-bold text-sm" 
                    >
                        Ver más
                    </a>
                </li>
            @endforeach
        </ul>