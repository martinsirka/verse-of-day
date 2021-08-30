<template>
  <div id="nav" class="nav-inactive">
    <div>
      <router-link to="/">Home</router-link>
      <router-link to="/about">About</router-link>
    </div>
    <div>
      <template v-if="!isLoggedIn">
        <router-link :to="{ name: 'Login' }">Login</router-link>
        <router-link :to="{ name: 'Register' }">Register</router-link>
      </template>
      <template v-else>
        <div class="nav-user-logged">
          <router-link :to="{ name: 'Home' }">{{ user.name }}</router-link>
          <a href="#" @click="logout"><logOutIcon /></a>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import logOutIcon from "../components/Logout.vue";

export default {
  name: "Navgation",

  components: {
    logOutIcon,
  },

  computed: {
    ...mapState(["user"]),
    ...mapGetters(["isLoggedIn"]),

    // Other option
    // isLoggedIn() {
    //   return this.$store.getters.isLoggedIn
    // }
  },

  methods: {
    logout() {
      this.$store.commit("logout");
      this.$router.push({ name: "Login" });
    },
  },
};
</script>
