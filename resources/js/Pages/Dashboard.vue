<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Login Temperature
            </h2>
        </template>
        <div class="space-x-4 ml-10 right-0">
            <button class="rounded-non bg-pink-600" @click="filter('temperature_celsius')">Hottest First</button>
            <button class="rounded-non bg-violet-600" @click="getList">Reset Order</button>
        </div>

        <div class="flex flex-row">
            <div class="basis-1/2" v-for="(data,index) in list" :key="index">
                <div class="w-fit text-center">
                    <span class="text-center ml-2">{{ index }}</span>
                </div>
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
