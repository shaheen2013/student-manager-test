<template>
    <div class="flex justify-center h-screen">
        <div class="container p-10 ">
            <div class="flex place-content-end mb-4">
                <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md cursor-pointer">
                    <Link href="/" class="text-sm font-medium">Back</Link>

                </div>
            </div>

            <form class="space-y-6 border p-5" @submit.prevent="saveStudent">
                <div class="space-y-4 rounded-md shadow-sm">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="text" class="block mt-1 w-full rounded border p-2" v-model="form.username">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input type="email" class="block mt-1 w-full rounded border p-2" v-model="form.email">
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
                    Create
                </button>
            </form>
        </div>
    </div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { reactive } from "vue";

export default {
    components: {
        Link
    },
    data() {
        return {
            form: {
                username: "",
                email: ""
            }
        }
    },
    methods: {
        saveStudent() {
            this.$inertia.post('/', this.form)
                .then(() => {
                    this.$inertia.visit('/');
                })
                .catch(error => {
                    console.error('Error deleting student:', error);
                });
        }
    }
}
</script>