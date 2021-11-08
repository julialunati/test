<template>
  <ul class="list-group" v-for="item in customer" :key="item.id">
    <li class="list-group-item">Id: {{ item.id }}</li>
    <li class="list-group-item">First name: {{ item.firstname }}</li>
    <li class="list-group-item">Last name: {{ item.lastname }}</li>
    <li class="list-group-item">Username: {{ item.username }}</li>
    <li class="list-group-item">Email: {{ item.email }}</li>
    <li class="list-group-item">Address: {{ item.street }} street, {{ item.city }},
        {{ item.zip }}, {{ item.country }}
    </li>
    <li class="list-group-item" v-if="item.company_name">Company: {{ item.company_name }}, {{ item.description }}</li>
        <li class="list-group-item" v-else>no company listed</li>
  </ul>
</template>

<script>
import useCustomers from "../../composables/customers";
import { onMounted } from "vue";

export default {
  props: {
    id: {
      required: true,
      type: String,
    },
  },

  setup(props) {
    const { errors, customer, getCustomer } = useCustomers();

    onMounted(getCustomer(props.id));

    return {
      errors,
      customer,
    };
  },
};
</script>
