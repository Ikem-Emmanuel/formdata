<template>
    <div class="py-20 sm:py-0 mx-4">
        <div class='flex flex-col h-screen items-center justify-center '>
            <div class="text-center  sm:pb-20">
                <h1 class="text-green-300 font-bold text-5xl">Nigerian Students' Qualification Check</h1>
            </div>
            <section class="py-8 mx-auto text-center" v-show="!errors">
                <p class="text-red-500 px-10 mx-auto py-5 w-1/2  bg-red-200">We're sorry, we're not able to retrieve this information at the moment, please try again</p>
            </section>
            <section class="py-8 mx-auto text-center" v-show="success">
                <p class="text-green-500 px-10 mx-auto py-5 w-1/2  bg-green-200">We're sorry, we're not able to retrieve this information at the moment, please try again</p>
            </section>
<!--            <section v-show="success">-->
<!--                <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>-->
<!--            </section>-->
            <div class="w-full sm:w-2/4 xl:w-2/6 bg-light-normal rounded mx-8 shadow-lg ">
                <div class="bg-blue w-2/3 rounded-r-full shadow mt-6">
                    <div class="ml-4 py-2">
                        <span class="text-white text-md font-bold ">Select School and a Graduation Year</span>
                    </div>
                </div>
                <div class="py-2 md:py-3 px-4">
                    <form method="POST" class="text-left my-2" @submit.prevent="submit">
                        <div class="flex flex-col">
                            <div v-show="!isActive">
                                <div >
                                    <div class="py-6">
                                        <label for="" class="block"><span class="text-gray-hard">Select School Name </span></label>
                                        <div class="inline-block relative w-full" >
                                            <select  class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                                    id="university_name" name="university_name"  placeholder="School Name" v-model="fields.university_name">
                                                <option  v-for="university in universityDetails.universities" :value="university.id" v-bind="fields.university_name">{{university.name}}</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                        <div class="text-red-400 text-xs" v-if="errors && errors.university_name">{{errors.university_name[0]}}</div>
                                    </div>
                                    <div class="py-6">
                                        <div class="inline-block relative w-full">
                                            <label for="" class="block"><span class="text-gray-hard">Year of Graduation </span></label>
                                            <date-picker class="w-20" id="yearOfgraduation" name="yearOfgraduation" value-type="format" v-model="fields.yearOfgraduation" format="YYYY" type="year"  placeholder="Select the year of graduation"></date-picker>
                                        </div>
                                        <div class="text-red-400 text-xs" v-if="errors && errors.yearOfgraduation">{{errors.yearOfgraduation[0]}}</div>
                                    </div>
                                </div>
                                div
                                <div class="py-6">
                                    <label for="" class="block"><span class="text-gray-hard">Select Faculty/College </span></label>
                                    <div class="inline-block relative w-full">
                                        <select class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                                id="faculty" name="faculty" v-model="fields.faculty">
                                            <option v-for="faculty in universityDetails.faculties" :value="faculty.id" v-bind:value="fields.faculty">{{faculty.name}}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-red-400 text-xs" v-if="errors && errors.faculty">{{errors.faculty[0]}}</div>
                                </div>
                                <div class="py-6">
                                    <label for="" class="block"><span class="text-gray-hard">Select a Department </span></label>
                                    <div class="inline-block relative w-full">
                                        <select class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                                id="department" name="department" v-model="fields.department">
                                            <option v-for="department in universityDetails.department" :value="department.id" v-bind:value="fields.department">{{department.name}}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-red-400 text-xs" v-if="errors && errors.department">{{errors.department[0]}}</div>
                                </div>
                                <div class="py-6">
                                    <label for="" class="block"><span class="text-gray-hard">Select a Degree </span></label>
                                    <div class="inline-block relative w-full">
                                        <select class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                                id="degree" name="degree" v-model="fields.degree">
                                            <option v-for="degree in universityDetails.degree" :value="degree.id" v-bind:value="fields.degree">{{degree.name}}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-red-400 text-xs" v-if="errors && errors.degree">{{errors.degree[0]}}</div>
                                </div>
                                <button type="button" @click='toggle()' class="bg-blue flex justify-center text-white mt-6 py-2 rounded ">
                                    <h1 class="text-light-normal font-semibold text-center px-4">
                                        Next
                                    </h1>
                                </button>
                            </div>
                            <div v-show="isActive">
                                <div class="py-6">
                                    <label for="" class="block"><span class="text-gray-hard">Select a Class </span></label>
                                    <div class="inline-block relative w-full">
                                        <select class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                                id="classes" name="classes" v-model="fields.class">
                                            <option v-for="classes in universityDetails.classes" :value="classes.id" v-bind:value="fields.class">{{classes.type}}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-red-400 text-xs" v-if="errors && errors.university_name">{{errors.university_name[0]}}</div>
                                </div>
                                <div>
                                    <div class="flex flex-row py-6 space-x-5">
                                        <div class="inline-block relative w-full">
                                            <label for="" class="block"><span class="text-gray-hard">Date of Birth </span></label>
                                            <date-picker class="w-20" id="dateOfbirth" name="dateOfbirth" value-type="format" v-model="fields.dateOfbirth" format="YYYY-MM-DD" type="date"  placeholder="Select date"></date-picker>
                                            <div class="text-red-400 text-xs" v-if="errors && errors.dateOfbirth">{{errors.dateOfbirth[0]}}</div>
                                        </div>
                                        <div class="inline-block relative w-full">
                                            <label for="" class="block"><span class="text-gray-hard">Year of Admission </span></label>
                                            <date-picker class="w-20" id="yearOfAdmission" name="yearOfAdmission" value-type="format" v-model="fields.yearOfAdmission" format="YYYY" type="year"  placeholder="Select a year of graduation date"></date-picker>
                                            <div class="text-red-400 text-xs" v-if="errors && errors.yearOfAdmission">{{errors.yearOfAdmission[0]}}</div>
                                        </div>
                                    </div>
                                    <div class="flex flex-row py-6 space-x-2">
                                        <div class="inline-block relative w-full">
                                            <label for="" class="block"><span class="text-gray-hard">Lastname </span></label>
                                            <input class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                            <div class="text-red-400 text-xs" v-if="errors && errors.lastname">{{errors.lastname[0]}}</div>
                                        </div>
                                        <div class="inline-block relative w-full">
                                            <label for="" class="block"><span class="text-gray-hard">Firstname </span></label>
                                            <input class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                            <div class="text-red-400 text-xs" v-if="errors && errors.firstname">{{errors.firstname[0]}}</div>
                                        </div>
                                        <div class="inline-block relative w-full">
                                            <label for="" class="block"><span class="text-gray-hard">Middlename </span></label>
                                            <input class="block appearance-none w-full bg-white text-sm hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                            <div class="text-red-400 text-xs" v-if="errors && errors.middlename">{{errors.middlename[0]}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row items-center space-x-5">
                                    <div class="">
                                        <button type="submit" class="bg-blue flex justify-center text-white w-full py-2 rounded ">
                                            <h1 class="text-light-normal font-semibold text-center px-4">
                                                Submit
                                            </h1>
                                        </button>
                                    </div>
                                    <div>
                                        <button type="submit" class="bg-blue flex justify-center text-white w-full py-2 rounded ">
                                            <h1 class="text-light-normal font-semibold text-center px-4">
                                                Finish
                                            </h1>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import DatePicker from 'vue2-datepicker'
    import 'vue2-datepicker/index.css'

    export default {
        name: 'Form',
        data () {
            return {
                fields:{
                    degree: 'Select a Degree',
                    department: 'Select a Department',
                    faculty: 'Select a Faculty',
                    class: 'Select a Class',
                    dateOfbirth: 'Select a Date of Birth',
                    firstname: 'Enter Student Firstname',
                    lastname: 'Enter Student Lastname',
                    middlename: 'Enter Student Middlename',
                    yearOfAdmission: 'Select a year of Admission',
                    university_name: 'Select a University Name',
                    yearOfgraduation: 'Select a year of Graduation'
                },
                universityDetails:{},
                date:2020,
                loading: true,
                success: false,
                errors : {},
                isActive:false,
                enableSort: false,
                sorting:-5,
            }
        },
        mounted() {
            this.enableSort = true
            axios
                .get('/api/schools')
                .then(response => {
                    this.universityDetails = response.data
                    console.log(  this.universityDetails)
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() => this.loading = false)
        },
        methods: {
            toggle: function(){
                this.isActive = !this.isActive
            },
            clear(field){
                delete this.errors[field]
            },
            // finish() {
            //     axios.post('/api/schools', this.fields).then(response => {
            //         this.fields = {
            //             university_name:null
            //         };
            //         this.isActive = !this.isActive
            //         this.success = true;
            //         this.errors = {};
            //     }).catch(error => {
            //         if (error.response.status === 422) {
            //             this.errors = error.response.data.errors;
            //         }
            //         console.log('Error');
            //     });
            // },
            submit() {
                axios.post('/api/schools', this.fields).then(response => {
                    this.fields = {
                        dateOfbirth: '',
                        firstname: '',
                        lastname: '',
                        middlename: '',
                        yearOfAdmission: '',
                    };
                    console.log(this.fields),
                    this.success = true;
                    this.errors = {};
                }).catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                    console.log('Error');
                });
            }
        }
    };
</script>
