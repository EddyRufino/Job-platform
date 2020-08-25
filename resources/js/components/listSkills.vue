<template>
     <!-- v-for="(index, sksill) in habis"
            :key="index" -->
    <ul class="flex flex-wrap justify-center">
        <li class="border border-gray-500 px-10 py-3 md-3 rounded"
           
            >

            {{ habis }}
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['skills'],
        data() {
            return {
                habis: []
            }
        },
        mounted() {
            // console.log(this.skills[0])
            for(let skill of this.skills) {
                console.log(skill)
                this.habis = skill;
            }
        }
    }
</script>
