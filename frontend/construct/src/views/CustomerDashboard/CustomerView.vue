        <template>
        <div>
            hello customer {{ name }}
            <a
            class="cursor-pointer bg-dash-bleu text-white p-2.5 ml-24 mb-20 rounded"
            v-on:click="removeCookie"
            >Log Out</a
            >
        </div>
        </template>
        <script>
        export default {
        data() {
            return { name: "" };
        },
        mounted() {
            this.name = this.$cookies.get("name");
        },
        beforeMount() {},
        methods: {
            removeCookie: function (e) {
            this.$cookies.remove("idcustomer");
            this.$cookies.remove("email");
            this.$cookies.remove("name");
            this.$router.push("/login");
            },
        },
        };
        </script>
