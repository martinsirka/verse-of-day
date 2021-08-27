import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    auth: {
      accessToken: null,
      expiresIn: null
    },

    user: {}
  },
  getters: {
    isLoggedIn(state) {
      return state.user.email !== undefined
      // return state.user.hasOwnProperty('email')  // Other option
    }
  },

  mutations: {
    setToken(state, payload) {
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.access_token;
      state.auth.accessToken = payload.access_token
      state.auth.expiresIn = payload.expires_in
    },

    setUser(state, payload) {
      state.user = payload
    },

    logout(state) {
      state.auth.accessToken = null,
      state.auth.expiresIn = null,
      state.user = {}
    }
  },
  actions: {},
  modules: {},

  plugins: [createPersistedState({
    rehydrated(store) {
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + store.state.auth.accessToken;
    }
  })],
});
