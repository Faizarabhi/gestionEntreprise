<template>
    <div  class="w-full p-8">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Job</th>
                        <th>Favorite Color</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <onecustomer />


                </tbody>
            </table>
        </div>

        

    </div>

</template>
<script>
import onecustomer from "./onecustomer.vue";
export default {
    components: {
        onecustomer
    },
}



</script>