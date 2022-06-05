<template>
    <div>
        <table>
            <thead>
                <th>hello</th>
            </thead>
            <tbody>
                <customer />
            </tbody>
        </table>

    </div>
</template>
<script>
import customer from '../DashboardComponents/customer.vue'
export default {
    component: {
        customer
    }
}
</script>