<template>
  <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
    <table class="min-w-full border divide-y divide-gray-200">
      <thead>
        <tr>
          <th class="px-6 py-3 bg-gray-50">
            <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">#</span>
          </th>
          <th class="px-6 py-3 bg-gray-50">
            <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">First name</span>
          </th>
          <th class="px-6 py-3 bg-gray-50">
            <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Last name</span>
          </th>
          <th class="px-6 py-3 bg-gray-50">
            <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Username</span>
          </th>
          <th class="px-6 py-3 bg-gray-50">
            <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Email</span>
          </th>
          <th class="px-6 py-3 bg-gray-50">More info</th>
        </tr>
      </thead>

      <tbody class="bg-white divide-y divide-gray-200 divide-solid">
        <template v-for="item in customers" :key="item.id">
          <tr class="bg-white">
            <td class="px-6 py-4 text-sm leading-5ctext-gray-900cwhitespace-no-wrap">
              {{ item.id }}
            </td>
            <td class="px-6 py-4 text-sm leading-5ctext-gray-900cwhitespace-no-wrap">
              {{ item.firstname }}
            </td>
            <td class="px-6 py-4 text-sm leading-5ctext-gray-900cwhitespace-no-wrap">
              {{ item.lastname }}
            </td>
            <td class="px-6 py-4 text-sm leading-5ctext-gray-900cwhitespace-no-wrap">
              {{ item.username }}
            </td>
            <td class="px-6 py-4 text-sm leading-5ctext-gray-900cwhitespace-no-wrap">
              {{ item.email }}
            </td>
            <td class="px-6 py-4 text-sm leading-5ctext-gray-900cwhitespace-no-wrap">
              <router-link
                :to="{ name: 'customers.show', params: { id: item.id } }"
                class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Show
              </router-link>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
</template>

<script>
import useCustomers from "../../composables/customers";
import { onMounted } from "vue";

export default {
  setup() {
    const { customers, getCustomers, getCustomer } = useCustomers();

    onMounted(getCustomers);

    return {
      customers,
      getCustomer,
    };
  },
};
</script>
