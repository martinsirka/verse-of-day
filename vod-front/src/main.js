import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from 'axios';
import './assets/css/main.scss';
import './assets/js/index.js';

axios.defaults.baseURL = 'http://verse-of-day';

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");
