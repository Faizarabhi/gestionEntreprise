<template>
    <tr v-for="(customer, index) in customers" :key="customer.id">
        <td>{{ customer.photo }}</td>
        <th>{{ customer.name }}</th>
        <td>{{ customer.tel }}</td>
        <td>{{ customer.email }}</td>
        <td>{{ customer.metier }}</td>
        <td> <a @click="handleUpdate(customer.id)" href=""
                class="inline-flex items-center justify-center ">
                <lottie-animation @mouseover="start('edit', index)" @mouseleave="stop('edit', index)" ref="edit"
                    :speed="1" :autoPlay="false" path="lottie/edit.json" />
            </a>
        </td>
        <td><a @click="deleteCustomer(customer.id)" class="inline-flex items-center justify-center ">
                <lottie-animation @mouseover="start('trash', index)" @mouseout="stop('trash', index)" ref="trash"
                    :speed=".1" :autoPlay="false" path="lottie/trashV2.json" />
            </a></td>
    </tr>


</template>
<script>
import axios from 'axios';

import LottieAnimation from "lottie-vuejs/src/LottieAnimation.vue";
export default {
    components: {
        LottieAnimation
    },


    data() {
        return {
            customers: [],
            form: {
                email: "",
                id: "",
                metier: "",
                name: "",
                password: "",
                photo: "",
                tel: ""
            },
        }
    },
    mounted() {
        this.getAllCustomer();
    },
    methods: {

        start(refName, index) {
            const el = index !== undefined ? this.$refs[refName]?.[index] : this.$refs[refName];
            el.anim.play();
        },
        stop(refName, index) {
            const el = index !== undefined ? this.$refs[refName]?.[index] : this.$refs[refName];
            el.anim.stop();
        },
        getAllCustomer() {

            axios.get('http://localhost/filrouge/backend/public/CustomerController/getAll_customer')
                .then(res => {
                    this.customers = res.data
                    console.log(this.customers)


                })
        },
        deleteCustomer(id) {
            console.log(id);
        },
        handleUpdate(customers) {
            console.log(customers)
                this.form.id = customers.id,
                this.form.email = customers.email,
                this.form.metier = customers.metier,
                this.form.name = customers.name,
                this.form.password = customers.password,
                this.form.photo = customers.photo,
                this.form.tel = customers.tel
        },
        updateCustomer(){
            // http://localhost/filrouge/backend/public/CustomerController/update_customer
        }
    }
}


</script>