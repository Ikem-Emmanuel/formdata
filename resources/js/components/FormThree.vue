<template>
    <div>
        <div class="flex flex-row py-6 space-x-5">
            <div class="inline-block relative w-full">
                <label for="" class="block"><span class="text-gray-hard">Date of Birth </span></label>
                <date-picker class="w-20" v-model="date" format="YYYY-MM-DD" type="date"  placeholder="Select date"></date-picker>
            </div>
            <div class="inline-block relative w-full">
                <label for="" class="block"><span class="text-gray-hard">Year of Admission </span></label>
                <date-picker class="w-20" v-model="yearOfAdmission" format="YYYY" type="year"  placeholder="Select a year of graduation date"></date-picker>
            </div>
        </div>
        <div class="py-6">
            <label for="" class="block"><span class="text-gray-hard">Enter Students' Name </span></label>
            <div class="inline-block relative w-full">
                <input class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <p class="text-gray-600 text-xs italic">LastName/FirstName/MiddleName</p>
            </div>
        </div>
    </div>
</template>

<script>
    import DatePicker from 'vue2-datepicker'
    import 'vue2-datepicker/index.css'
    export default {
        name: "FormThree",
        components:{
          DatePicker
        },
        props: {
            universityDetails:Object,
        },
        data(){
          return{
              date: '',
              yearOfAdmission: ''
          }
        },
    }
</script>

<style scoped>

</style>
