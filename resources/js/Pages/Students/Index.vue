<template>
    <div class="flex justify-center h-screen">
        <div class="container p-10">
            <div class="flex place-content-end mb-4">
                <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md cursor-pointer">
                    <Link href="/create" class="text-sm font-medium">Add
                    Student</Link>

                </div>
            </div>

            <table class="min-w-full border divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Name</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Email</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Delete</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    <template v-for="student in students" :key="student.id">
                        <tr class="bg-white">
                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                {{ student.username }}
                            </td>
                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                {{ student.email }}
                            </td>
                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                <button @click="deleteStudent(student.id)"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
    props: ['students'],
    components: {
        Link
    },
    methods: {
        deleteStudent(studentId) {
            this.$inertia.delete(`/${studentId}`)
                .then(() => {
                    console.log("Student has been deleted.")
                })
                .catch(error => {
                    console.error('Error deleting student:', error);
                });
        }
    }
}
</script>