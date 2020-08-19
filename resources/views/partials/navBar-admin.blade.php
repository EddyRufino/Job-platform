<a href="{{ route('vacantes.index') }}"
	class="text-white text-sm uppercase font-bold p-3
	{{ Request::routeIs('vacantes.index') ? 'bg-blue-600' : '' }}"
	>
		Ver vacantes
</a>
<a href="{{ route('vacantes.create') }}"
	class="text-white text-sm uppercase font-bold p-3
	{{ Request::routeIs('vacantes.create') ? 'bg-blue-600' : '' }}"
	>
		Nueva vacante
</a>