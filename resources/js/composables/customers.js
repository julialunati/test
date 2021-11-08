import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCustomers() {
    const customers = ref([])
    const customer = ref([])
    const router = useRouter()
    const errors = ref('')

    const getCustomers = async () => {
        let response = await axios.get('/api/customers')
        customers.value = response.data.data;
    }

    const getCustomer = async (id) => {
        let response = await axios.get('/api/customers/' + id)
        customer.value = response.data.data;
    }

    const storeCustomer = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/customers/', data)
            await router.push({
                name: 'customers.notification'
            })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    return {
        customers,
        customer,
        errors,
        getCustomers,
        getCustomer,
        storeCustomer,
    }
}
