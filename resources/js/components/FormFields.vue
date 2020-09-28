<template>
    <div class="py-2 md:py-3 px-4">
        <form action="" class="text-left my-2">
            <div class="flex flex-col">
                <FormOne v-bind="schoolProps"/>
                <FormTwo v-bind="schoolProps"/>
                <FormThree v-bind="schoolProps"/>
                <button class="bg-blue flex justify-center text-white mt-6 py-2 rounded ">
                    <h1 class="text-light-normal font-semibold text-center">
                        Sign Up
                    </h1>
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import FormOne from "./FormOne";
    import FormTwo from "./FormTwo";
    import {schoolProps} from "./props";
    import FormThree from "./FormThree";
    export default {
        name: "FormFields",
        components: {FormThree, FormOne, FormTwo},
        data () {
            return{
                schoolProps,
            }
    },
    }
</script>

<style scoped>

</style>
