<template>
    <div class="h-screen overflow-hidden flex justify-center -pt-10">
        <!-- Header -->
        <div class="font-sans bg-grey-lighter flex flex-col w-full">
            <div class="py-4 sm:py-0">
                <div class="flex h-screen items-center justify-center">
                    <div class="w-full lg:flex-none sm:w-2/4 xl:w-1/4 bg-light-normal rounded mx-8 shadow-lg ">
                        <div class="my-2">
                            <div class="py-2 md:py-3 px-6">
                                <div class="flex flex-col items-center">
                                    <div class="mt-6 text-blue">
                                        <!-- <img src="../../assets/images/logo.svg" /> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-blue w-1/3 rounded-r-full shadow">
                            <div class="ml-6 py-2">
                                <span class="text-white text-md font-bold">Sign In</span>
                            </div>
                        </div>
                        <div class="">
                            <div class="py-2 md:py-3 px-6">
                                <div class="">
                                    <form method="POST" class="text-left my-2" @click.prevent="login()">
                                        <div class="flex flex-col justify-center">
                                            <div class="mt-4">
                                                <label class="block" for="username">
                                                    <span class="text-gray-hard">Enter Username </span>
                                                    <input class="bg-light-hard p-2 w-full rounded-sm" maxlenght="10" minlenght="8" placeholder="Botosoft" required type="email" v-model="username"/>
                                                </label>
                                            </div>
                                            <div class="mt-4">
                                                <label class="block" for="">
                                                    <span class="text-gray-hard">Enter Password</span>
                                                    <input class="bg-light-hard p-2 w-full rounded-sm" maxlenght="10" minlenght="8" placeholder="*******" required type="password" v-model="password"/>
                                                </label>
                                            </div>
                                            <button type="submit" class="bg-blue flex justify-center text-white mt-6 py-2 rounded " >
                                                <h1 class="text-light-normal font-semibold text-center">
                                                    Login
                                                </h1>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "login",
        data: () => ({
            username: '',
            password: '',
            errors: false
        }),
        methods: {
            login() {
                this.$store.dispatch("LOGIN", {
                    username: this.username,
                    password: this.password
                })
                    .then(response => {
                        this.router.push('/home')
                    })
                    .catch(error => {
                        this.errors = !this.errors
                    })
            }
        }
    }
</script>

<style scoped>

</style>
