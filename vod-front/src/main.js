import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from "axios";
import Vuelidate from "vuelidate";

Vue.use(Vuelidate);

axios.defaults.baseURL = "http://verse-of-day";

axios.interceptors.request.use((request) => {
  axios.defaults.headers.common["Authorization"] =
    "Bearer " + store.state.auth.accessToken;
  return request;
});

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");
