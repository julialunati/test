require('./bootstrap');

require('alpinejs');

import { createApp } from "vue";
import router from './router'
import CustomersIndex from './components/customers/CustomersIndex'

createApp({
    components: {
        CustomersIndex
    }
}).use(router).mount('#app')
