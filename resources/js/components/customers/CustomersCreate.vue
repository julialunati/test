<template>
    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>

    <form class="space-y-6" @submit.prevent="saveCustomer">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700">First name</label>
                <div class="mt-1">
                    <input type="text" name="firstname" id="firstname"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.firstname">
                </div>
            </div>

            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700">Last name</label>
                <div class="mt-1">
                    <input type="text" name="lastname" id="lastname"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.lastname">
                </div>
            </div>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <div class="mt-1">
                    <input type="text" name="username" id="username"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.username">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="text" name="email" id="email"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.email">
                </div>
            </div>

            <div>
                <label for="street" class="block text-sm font-medium text-gray-700">Street</label>
                <div class="mt-1">
                    <input type="text" name="street" id="street"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.street">
                </div>
            </div>


            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <div class="mt-1">
                    <input type="text" name="city" id="city"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.city">
                </div>
            </div>


            <div>
                <label for="zip" class="block text-sm font-medium text-gray-700">Zip</label>
                <div class="mt-1">
                    <input type="text" name="zip" id="zip"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.zip">
                </div>
            </div>


            <div>
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <div class="mt-1">
                    <input type="text" name="country" id="country"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.country">
                </div>
            </div>
            <div class="block text-sm font-medium text-gray-700">Do you have a company?</div>
            <div class="form-check">
                <input  @click='toggle.data = !toggle.data' class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Yes
                    </label>
            </div> 
            <div class="form-check">
                 <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                     <label class="form-check-label" for="flexRadioDefault2">
                          No
                    </label>
            </div>
             <div v-show='toggle.data'>
                <div>
                    <label for="company_name" class="block text-sm font-medium text-gray-700">Company name</label>
                    <div class="mt-1">
                    <input type="text" name="company_name" id="company_name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.company_name">
                    </div>
                 </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <div class="mt-1">
                    <input type="text" name="description" id="description"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.description">
                    </div>
                </div>
             </div>
        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Create
        </button>
    </form>
</template>

<script>
import { reactive } from "vue";
import useCustomers from "../../composables/customers";

export default {
    setup() {
        const toggle = reactive({
            'data': false,
        });

        const form = reactive({
            'firstname': '',
            'lastname': '',
            'username': '',
            'email': '',
            'street': '',
            'city': '',
            'country': '',
            'zip': '',
            'company_name': '',
            'description': '',
        })

        const { errors, storeCustomer } = useCustomers()

        const saveCustomer = async () => {
            await storeCustomer({...form});
        }

        return {
            toggle,
            form,
            errors,
            saveCustomer
        }
    }
}
</script>
