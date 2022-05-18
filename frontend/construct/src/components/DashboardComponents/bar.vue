<template>

    <div class="flex">

    <sidebar :isShow="isShow" :show="show"/>
    <navbar :isShow="isShow" :show="show"/>
    <router-view/>
    
    </div>
</template>
<script>
import sidebar from './sidebar.vue'
import navbar from './navbar.vue'
import st from './profile.vue'


export default {
    components: {
        sidebar,
        navbar,
        st
    
        },
        data(){
            return {
                isShow : true
            }
        },
        methods: {
        show : function(){
            this.isShow =!this.isShow

        }
    }
        }
        
</script>



