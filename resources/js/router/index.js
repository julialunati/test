import { createRouter, createWebHistory } from "vue-router";

import CustomersIndex from '../components/customers/CustomersIndex'
import CustomersCreate from '../components/customers/CustomersCreate'
import CustomersShow from '../components/customers/CustomersShow'
import CustomersNotification from '../components/customers/CustomersNotification'

const routes = [
    {
        path: '/dashboard',
        name: 'customers.index',
        component: CustomersIndex
    },
    {
        path: '/customers/create',
        name: 'customers.create',
        component: CustomersCreate
    },
    {
        path: '/customers/:id/show',
        name: 'customers.show',
        component: CustomersShow,
        props: true
    },
    {
        path: '/customers/notification',
        name: 'customers.notification',
        component: CustomersNotification
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
