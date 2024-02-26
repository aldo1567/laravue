<template>
    <div>
        <div class="px-5 py-5">
            <h1 class="text-2xl text-center">Data Karyawan</h1>
            <div class="flex justify-end items-end">
                <button
                    @click="showCreatePopup"
                    class="middle none center mr-3 rounded-lg bg-green-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                >
                    Add Karyawan
                </button>
            </div>
            <div
                class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5"
            >
                <table
                    class="w-full border-collapse bg-white text-left text-sm text-gray-500"
                >
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-gray-900"
                            >
                                No
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-gray-900"
                            >
                                Name
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-gray-900"
                            >
                                email
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-gray-900"
                            ></th>
                        </tr>
                    </thead>
                    <tbody
                        class="divide-y divide-gray-100 border-t border-gray-100"
                    >
                        <tr
                            class="hover:bg-gray-50"
                            v-for="(data, index) in karyawan"
                            :key="index"
                        >
                            <td class="px-6 py-4">{{ index + 1 }}</td>
                            <td class="px-6 py-4">{{ data.name }}</td>
                            <td class="px-6 py-4">
                                {{ data.email }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <button
                                        x-data="{ tooltip: 'Delete' }"
                                        @click="Delete(data.id, index)"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="h-6 w-6"
                                            x-tooltip="tooltip"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                            />
                                        </svg>
                                    </button>
                                    <button
                                        x-data="{ tooltip: 'Edit' }"
                                        @click="showEditPopup(data)"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="h-6 w-6"
                                            x-tooltip="tooltip"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <transition name="fade">
            <div
                v-if="CreatePopup"
                class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50"
            >
                <div class="bg-white p-8 max-w-md mx-auto rounded shadow-lg">
                    <h2 class="text-lg font-bold mb-4">Add Employee</h2>

                    <!-- Form -->
                    <form>
                        <div class="mb-4">
                            <label
                                for="name"
                                class="block text-gray-700 font-bold mb-2"
                                >Name:</label
                            >
                            <input
                                type="text"
                                v-model="employee.name"
                                id="name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            />
                        </div>
                        <div class="mb-4">
                            <label
                                for="position"
                                class="block text-gray-700 font-bold mb-2"
                                >Email:</label
                            >
                            <input
                                type="email"
                                v-model="employee.email"
                                id="position"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            />
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                type="button"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                @click="addEmployee"
                            >
                                Submit
                            </button>
                            <button
                                @click="closeCreatePopup"
                                class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </transition>

        <transition name="fade">
            <div
                v-if="EditPopup"
                class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50"
            >
                <div class="bg-white p-8 max-w-md mx-auto rounded shadow-lg">
                    <h2 class="text-lg font-bold mb-4">Add Employee</h2>

                    <!-- Form -->
                    <form>
                        <div class="mb-4">
                            <label
                                for="name"
                                class="block text-gray-700 font-bold mb-2"
                                >Name:</label
                            >
                            <input
                                type="text"
                                v-model="employee.name"
                                id="name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            />
                        </div>
                        <div class="mb-4">
                            <label
                                for="position"
                                class="block text-gray-700 font-bold mb-2"
                                >Position:</label
                            >
                            <input
                                type="text"
                                v-model="employee.email"
                                id="position"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            />
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                type="button"
                                @click="updateEmployee"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Submit
                            </button>
                            <button
                                @click="closeEditPopup"
                                class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            >
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
import Swal from "sweetalert2";
import axios from "axios";
export default {
    data() {
        return {
            CreatePopup: false,
            EditPopup: false,
            employee: {
                name: "",
                email: "",
            },
            karyawan: [],
            id: 0
        };
    },

    mounted() {
        this.getEmployee();
    },

    methods: {
        showCreatePopup() {
            this.CreatePopup = true;
        },

        closeCreatePopup() {
            this.CreatePopup = false;
        },

        showEditPopup(data) {
            this.EditPopup = true;
            this.employee.name = data.name
            this.employee.email = data.email
            this.id = data.id
        },

        closeEditPopup() {
            this.EditPopup = false;
        },

        async getEmployee() {
            const resp = await axios.get("/api/karyawan");
            if (!resp.status) {
                Swal.fire({
                    title: "Oops...!",
                    text: "Failed to save data",
                    icon: "error",
                });
            }
            this.karyawan = resp.data.data;
        },

        async addEmployee() {
            const resp = await axios.post("/api/karyawan", this.employee);
            if (resp.status == 200) {
                this.CreatePopup = false;
                this.employee.name = "";
                this.employee.email = "";
                this.getEmployee();
                Swal.fire({
                    title: "Success!",
                    text: resp.data.message,
                    icon: "success",
                });
            } else {
                Swal.fire({
                    title: "Oops...!",
                    text: "Failed to save data",
                    icon: "error",
                });
            }
        },

        async updateEmployee() {
            const res = await axios.post('/api/karyawan/' + this.id, this.employee)
            if (res.data.status == true) {
                this.EditPopup = false;
                this.getEmployee()
                Swal.fire({
                    title: "Success!",
                    text: res.data.message,
                    icon: "success",
                });
            } else {
                Swal.fire({
                    title: "Oops...!",
                    text: "Failed to save data",
                    icon: "error",
                });
            }

        },

        Delete(id, index) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then(async(result) => {
                if (result.isConfirmed) {
                    const res = await axios.delete("/api/karyawan/" + id);
                    if (res.data.status == true) {
                        this.karyawan.splice(index,1)
                    }
                    Swal.fire({
                        title: "Deleted!",
                        text: res.data.message,
                        icon: "success",
                    });
                }
            });
        },
    },
};
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
