<template>
  <div id="app">
    <Navigation />
    <div class="container">
      <router-view />
    </div>
    <Footer />
  </div>
</template>

<script>
import "./assets/js/index";
import Navigation from "./components/Navigation.vue";
import Footer from "./components/Footer.vue";

export default {
  components: {
    Navigation,
    Footer,
  },
};
</script>

<style lang="scss">
@import "./assets/css/main.scss";
</style>
