<template>
    <div class="auth_wrapper">
        <div class="auth_title">Login</div>
        <div class="auth_group">
            <input v-model="form.email" type="email" placeholder="email" class="auth_input" name="email" @focus="onFocus('email')" @blur="onBlur('email')">
        </div>
        <div class="auth_group">
            <input v-model="form.password" type="password" placeholder="password" class="auth_input" name="password" @focus="onFocus('password')" @blur="onBlur('password')">
        </div>
        <div class="auth_group pos-flex-end">
            <button class="btn-theme" @click="login">Login</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "Login",

    data() {
        return {
            form: {
                email: null,
                password: null
            }
        }
    },

    methods: {
        onFocus(name) {
            const inputField = document.querySelectorAll('.auth_input')

            inputField.forEach(item => {
                if (item.getAttribute("name") == name) {
                    item.classList.add('light_border')
                }
            })
        },

        onBlur(name) {
            const inputField = document.querySelectorAll('.auth_input')

            inputField.forEach(item => {
                if (item.getAttribute("name") == name) {
                    item.classList.remove('light_border')
                }
            })
        },

        login() {
            axios.post('/api/auth/login', this.form)
                .then(response => {
                    this.$store.commit('setToken', response.data);

                    axios.get('/api/auth/me')
                        .then(response => {
                            this.$store.commit('setUser', response.data);
                            this.$router.push({name: 'Home'});
                        })
                })
                .catch(error => {
                    if (error.response && error.response === 401) {
                        alert('Invalid email or password.')
                    } else {
                        alert('Faild to login.')
                    }
                })
        }
    },
};
</script>