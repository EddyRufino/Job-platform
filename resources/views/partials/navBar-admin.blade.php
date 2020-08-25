<a href="{{ route('vacancies.index') }}"
	class="text-white text-sm uppercase font-bold p-3
	{{ Request::routeIs('vacancies.index') ? 'bg-blue-600' : '' }}"
	>
		Ver vacantes
</a>

<a href="#" class="modal-open text-white text-sm uppercase font-bold p-3">
		Nueva vacante
</a>
