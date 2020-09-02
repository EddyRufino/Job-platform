<template>
	<span class="px-2 inline-flex text-xs leading-5 font-semibold 		rounded-full"
        :class="changeColor"
        @click="changeState"
    >
    	{{ stateText }}
	</span>
</template>

<script>
	export default {
		props: ['state', 'vacancy_id', 'slug'],
		data() {
			return {
				stateVacancy: Number(this.state),
			}
		},
		mounted() {
			// this.stateVacancy = Number(this.state);
		},
		computed: {
			stateText() {
				return this.stateVacancy === 1 ? 'Activo' : 'Inactivo';
			},
			changeColor() {
				return this.stateVacancy === 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
			}
		},
		methods: {
			changeState() {
				if(this.stateVacancy === 1) {
					this.stateVacancy = 0;
				} else {
					this.stateVacancy = 1;
				}

				const params = {
					active: this.stateVacancy
				}

				axios.post('/vacancies/' + this.slug, params)
					.then(res => console.log(res) )
					.catch(error => console.log(error))
				}

		}
	}
</script>