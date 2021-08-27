<template>
    <div class="auth_wrapper">
        <div class="auth_title">Register</div>
        <div class="auth_group">
            <input v-model="form.name" type="text" placeholder="Name" class="auth_input" name="name" @focus="onFocus('name')" @blur="onBlur('name')">
        </div>
        <div class="auth_group">
            <input v-model="form.email" type="email" placeholder="email" class="auth_input" name="email" @focus="onFocus('email')" @blur="onBlur('email')">
        </div>
        <div class="auth_group">
            <input v-model="form.password" type="password" placeholder="password" class="auth_input" name="password" @focus="onFocus('password')" @blur="onBlur('password')">
        </div>
        <div class="auth_group">
            <input v-model="form.repeat_password" type="password" placeholder="Repeat password" class="auth_input" name="repeat_password" @focus="onFocus('repeat_password')" @blur="onBlur('repeat_password')">
        </div>
        <div class="auth_group pos-flex-end">
            <button class="btn-theme" @click="register">Register</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "Register",

    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                repeat_password: null,
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

        register() {
            axios.post('/api/auth/register', this.form)
                .then(() => {
                    this.$router.push({name: 'Login'})
                })
                .catch(error => {
                    alert('Registration faild, pleas try again.')
                    console.log('Faild to register', error)
                })
        }
    },
};
</script>