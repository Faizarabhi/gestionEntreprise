<template>
    <div >
      
    <bar/>
    
    </div>
</template>
<script>

import bar from '../components/DashboardComponents/bar.vue'
import router from '../router';






export default {
  data() {
    return {
      local:"",
    }
  },
  components: {
      
      bar,
      
      },
      beforeMount() {

      let id_check = this.$cookies.get("id");
      console.log(id_check)
      if(!id_check) router.push('/login')

      
      // this.check_admin(id_check);
      
      },
        }

</script>
