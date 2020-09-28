<template>
    <div>
        <div class="py-6">
            <label for="" class="block"><span class="text-gray-hard">Select School Name </span></label>
            <div class="inline-block relative w-full">
                <select class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                        id="university_name" name="university_name" v-model="fields.university_name" >
                    <option>Select a School</option>
                    <option  v-for="university in universityDetails.universities" :value="university.id" >{{university.name}}</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>
        <div class="flex flex-row py-6">
            <div class="inline-block relative w-full">
                <label for="" class="block"><span class="text-gray-hard">Year of Graduation </span></label>
                <date-picker class="w-20" v-model="fields.graduationYear" format="YYYY" type="year"  placeholder="Select the year of graduation"></date-picker>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FormOne",
        data(){
            return {
                fields:{
                    university_name:'Select a School',
                    graduationYear:2020
                }
            }
        },
        props: {
            universityDetails:Object,
            universities:Array,
            faculties:Array,
            loading: Boolean,
            errored : Boolean,
            enableSort: Boolean,
            sorting: Number,
        },
    }
</script>

<style scoped>

</style>
