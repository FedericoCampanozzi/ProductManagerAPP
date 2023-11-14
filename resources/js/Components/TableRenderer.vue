<script setup>
    const props = defineProps({
        items: {
            type: Array,
            required: true,
        },
        div_class: {
            type: String,
            required: false,
        },
        columns: {
            type: Array,
            required: true,
        },
        fixedHeader: {
            type: Boolean,
            required: false,
            default: false
        },
        noResultLabel: {
            type: String,
            required: false,
            default: "Zero Result"
        }
    });

    const tr_class = fixedHeader ? "bg-gray-50 dark:bg-gray-700 fixed-header" : ""
    const td_class = fixedHeader ? "px-6 py-3 fixed-header" : "px-6 py-3"
    const div_class = fixedHeader ? 
        "relative overflow-auto border shadow-md sm:rounded-lg fixed-table" : 
        "relative overflow-x-auto border shadow-md sm:rounded-lg"
</script>

<template>
<div class={{ div_class }}>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class={{tr_class}}>
                        <th scope="col" class={{td_class}}>Nr.</th>
                        <th scope="col" class={{td_class}}>{primary}</th>
                        <th v-for="column in columns" key="{{ column.value }}" scope="col" class={{td_class}}>
                            {{ column.name }}
                        </th>
                        <th scope="col" class={{td_class}}></th>
                    </tr>
                </thead>

                <tbody v-if="items.length == 0">
                    <tr class={{tr_class}}>
                        <td class={{td_class}} colSpan={{ columns.length + 3 }}>
                            {{noResultLabel}}
                        </td>
                    </tr>
                </tbody>

                <tbody v-for="item in items">
                    <tr key={{item.id}} class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{index+1}}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            #{{item.id}}
                        </td>
                        
                        <td v-for="column in columns" key="{{ column.value }}" scope="col" class={{td_class}}>
                            {{ column.name }}
                        </td>

                        <td scope="row" v-if="action != null">
                            {{actionlabel}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</template>