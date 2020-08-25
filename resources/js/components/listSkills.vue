<template>
    <ul class="flex flex-wrap justify-center">
        <li class="border border-gray-500 px-10 py-3 md-3 m-1 rounded"
           v-for="skill in skills"
        >
            {{ skill }}
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['skills'],
    }
</script>
