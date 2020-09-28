<template>
    <div class="py-20 sm:py-0 mx-4">
        <div class='flex flex-col h-screen items-center justify-center '>
            <div class="text-center  sm:pb-20">
                <h1 class="text-green-300 font-bold text-5xl">Nigerian Students' Qualification Check System</h1>
            </div>
            <section v-if="schoolProps.errored">
                <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
            </section>
            <div class="w-full sm:w-2/4 xl:w-2/6 bg-light-normal rounded mx-8 shadow-lg ">
                <div class="bg-blue w-2/3 rounded-r-full shadow mt-6">
                    <div class="ml-4 py-2">
                        <span class="text-white text-md font-bold ">Select School and a Graduation Year</span>
                    </div>
                </div>
                <FormFields v-bind="schoolProps"/>
            </div>
        </div>
    </div>
</template>

<script>
    import FormFields from "./FormFields"
    import {schoolProps} from "./props";

    export default {
        name: 'Form',
        components:{
          FormFields
        },
        data () {
            return {
                schoolProps,
                fields:{}
            }
        },
        mounted() {
            this.enableSort = true
            axios
                .get('http://127.0.0.1:8000/api/schools')
                .then(response => {
                    this.schoolProps.universityDetails = response.data
                    console.log(  this.schoolProps.universityDetails)
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() => this.loading = false)
        },
    };
</script>
