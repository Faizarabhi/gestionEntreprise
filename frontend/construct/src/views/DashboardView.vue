<template>
  <div class="h-screen w-screen">

    <bar />

  </div>
</template>
<script>

import { computed } from 'vue';
import bar from '../components/DashboardComponents/bar.vue'
import router from '../router';






export default {
  data() {
    return {
      local: "",
      showcmd: []
    }
  },
  components: {

    bar,

  },
  beforeMount() {

    let id_check = this.$cookies.get("idadmin");
    // console.log(id_check)
    if (!id_check) router.push('/login')


    // this.check_admin(id_check);

  },
  provide(){
    return {
        showcmd : computed(() => this.showcmd)
    }
  }
}

</script>
