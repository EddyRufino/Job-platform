<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li class="border border-gray-500 px-10 py-3 md-3 m-1 rounded cursor-pointer"
                :class="verifyClassActive(skill)"
               v-for="skill in skills"
               @click="chooseSkill($event)"
            >{{ skill }}</li>
        </ul>

        <input type="hidden" name="skills" id="skills">
    </div>
</template>

<script>
    export default {
        props: ['skills', 'oldskills'],
        data() {
            return {
                habilidades: new Set(),
            }
        },
        created: function() {
            if (this.oldskills) {
                const skillsArray = this.oldskills.split(',');
                skillsArray.forEach( skill => this.habilidades.add(skill) );
            }
        },
        mounted: function() {
            // Llena el input con las skills selecionadas antes de recargar la pagina
            document.querySelector('#skills').value = this.oldskills;
        },
        methods: {
            chooseSkill(e) {

                if (e.target.classList.contains('bg-teal-400')) {

                    e.target.classList.remove('bg-teal-400');
                    this.habilidades.delete(e.target.textContent);

                } else {

                    e.target.classList.add('bg-teal-400');
                    this.habilidades.add(e.target.textContent);

                }

                // Agregar las skills al input
                const stringHabilidades = [...this.habilidades];
                document.getElementById('skills').value = stringHabilidades;
            },
            verifyClassActive(skill) {
                return this.habilidades.has(skill) ? 'bg-teal-400' : '';
            }
        },
    }
</script>
