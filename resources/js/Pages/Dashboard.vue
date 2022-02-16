<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-sans text-5xl text-green-500 font-bold leading-tight">
                Login Temperatures
            </h2>
        </template>

        <div class="space-x-4 pt-6 pr-6 text-right">
            <button type="button" @click="filter('temperature_celsius')"
                    class="text-black font-bold bg-pink-600 hover:bg-pink-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-non text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                Hottest First
            </button>
            <button type="button" @click="getList"
                    class="text-black font-bold bg-violet-600 hover:bg-violet-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-non text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                Reset Order
            </button>

        </div>

        <div class="flex flex-row">
            <div class="basis-1/2" v-for="(data,index) in list" :key="index">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-bold text-gray-800 text-4xl capitalize">{{ index }}</h2>
                </header>
                <table class="min-w-full border divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    <template v-for="(item,k) in data" :key="k">
                        <tr class="bg-white">
                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                {{ item.created_at }}
                            </td>
                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                {{ item.celsius }}°C
                            </td>
                            <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                {{ item.fahrenheit }}°F
                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
export default {
    data() {
        return {
            list: [],
        }
    },
    mounted() {
        this.getList()
    },
    methods: {
        getList: function () {
            axios
                .get('temperature')
                .then((res) => {
                    this.list = res.data
                })
                .catch((error) => {
                    console.error(error)
                })
        },
        filter: function (orderby) {
            axios
                .get('temperature?orderby=' + orderby)
                .then((res) => {
                    this.list = res.data
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>
