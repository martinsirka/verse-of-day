<template>
  <div class="auth_wrapper">
    <div class="auth_title">Login</div>
    <div class="auth_group">
      <input
        v-model="form.email"
        type="email"
        placeholder="email"
        class="auth_input"
        :class="{ error: $v.form.email.$error }"
        name="email"
        @focus="onFocus('email')"
        @blur="onBlur('email')"
      />
      <div
        class="error-text"
        v-if="!$v.form.email.required && $v.form.email.$dirty"
      >
        Please enter your email.
      </div>
    </div>
    <div class="auth_group">
      <input
        v-model="form.password"
        type="password"
        placeholder="password"
        class="auth_input"
        :class="{ error: $v.form.email.$error }"
        name="password"
        @focus="onFocus('password')"
        @blur="onBlur('password')"
      />
      <div
        class="error-text"
        v-if="!$v.form.password.required && $v.form.password.$dirty"
      >
        Please enter your password.
      </div>
    </div>
    <div class="auth_group pos-flex-end">
      <button class="btn-theme" @click="login">Login</button>
    </div>
    <p class="auth-text">
      Don't have an account?
      <router-link class="link-auth" :to="{ name: 'Register' }"
        >Register</router-link
      >.
    </p>
  </div>
</template>

<script>
import axios from "axios";
import { required, email } from "vuelidate/lib/validators";

export default {
  name: "Login",

  data() {
    return {
      form: {
        email: null,
        password: null,
      },
    };
  },

  validations: {
    form: {
      email: {
        required,
        email,
      },
      password: {
        required,
      },
    },
  },

  methods: {
    onFocus(name) {
      const inputField = document.querySelectorAll(".auth_input");

      inputField.forEach((item) => {
        if (item.getAttribute("name") == name) {
          item.classList.add("light_border");
        }
      });
    },

    onBlur(name) {
      const inputField = document.querySelectorAll(".auth_input");

      inputField.forEach((item) => {
        if (item.getAttribute("name") == name) {
          item.classList.remove("light_border");
        }
      });
    },

    login() {
      this.$v.$touch();

      if (this.$v.$invalid) return;

      axios
        .post("/api/auth/login", this.form)
        .then((response) => {
          this.$store.commit("setToken", response.data);

          axios.get("/api/auth/me").then((response) => {
            this.$store.commit("setUser", response.data);
            this.$router.push({ name: "Home" });
          });
        })
        .catch((error) => {
          if (error.response && error.response === 401) {
            alert("Invalid email or password.");
          } else {
            alert("Faild to login.");
          }
        });
    },
  },
};
</script>
