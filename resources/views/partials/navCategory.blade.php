@foreach ($categories as $category)
	<a href="{{ route('categories.show', $category) }}"
		class="text-white text-sm font-bold p-3" 
	>
		{{ $category->name }}		
	</a>
@endforeach