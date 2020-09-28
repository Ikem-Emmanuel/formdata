<template>
    <div>
        <div class="py-6">
            <label for="" class="block"><span class="text-gray-hard">Select Faculty/College </span></label>
            <div class="inline-block relative w-full">
                <select class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option>Select a Faculty/College</option>
                    <option v-for="university in universityDetails.faculties" :value="university.id">{{university.name}}</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>
        <div class="py-6">
            <label for="" class="block"><span class="text-gray-hard">Select a Department </span></label>
            <div class="inline-block relative w-full">
                <select class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option>Select a Department</option>
                    <option v-for="university in universityDetails.department" :value="university.id">{{university.name}}</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>
        <div class="py-6">
            <label for="" class="block"><span class="text-gray-hard">Select a Degree </span></label>
            <div class="inline-block relative w-full">
                <select class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option>Select a Degree</option>
                    <option v-for="university in universityDetails.degree" :value="university.id">{{university.name}} <span>{{university.abbr}}</span></option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>
        <div class="py-6">
            <label for="" class="block"><span class="text-gray-hard">Select a Class </span></label>
            <div class="inline-block relative w-full">
                <select class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option>Select a Class</option>
                    <option v-for="university in universityDetails.classes" :value="university.id">{{university.type}}</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FormTwo",
        props: {
            universityDetails:Object,
        },
    }
</script>

<style scoped>

</style>
