<template>
	<button class="text-red-600 hover:text-red-900  mr-5"
		@click="deleteVacancy"
	>
		Eliminar
	</button>
</template>

<script>
	export default {
		props: ['vacancyId'],
		methods: {
			deleteVacancy() {
				this.$swal({
					title: '¿Deseas eliminar esta vacante?',
					text: "Una vez eliminada no se podrá recuperar!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sí, Eliminalo!'
				}).then((result) => {
					if (result.value) {
					  	const params = {
					  		id: this.vacancyId
					  	}
					  	axios.post(`/vacancies/${this.vacancyId}`,{
					  		params,
					  		_method: 'delete'
					  	})
					  	.then(response => {
					  		// console.log(response);
					    this.$swal({
					    	title: 'Vacante eliminada!',
					      	text: response.data.message,
					      	icon: 'success'
					    });
					    // Agrega .parentNode segun cuantos padres tenga tu delete
					  	this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
					  	})
					  	.catch(error => {
					  		console.log(error);	
					  	})
					  }
					})
			}
		}
	}
</script>