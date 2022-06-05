<template>
    <div  class="w-full p-8">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <!-- head -->
                <thead>
                    <tr>
                        <th>photo</th>
                        <th>Name</th>
                        <th>tel</th>
                        <th>email</th>
                        <th>metier</th>
                        <th></th>
                        <th></th>
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