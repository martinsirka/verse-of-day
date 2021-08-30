<template>
    <div class="auth_wrapper">
        <div class="auth_title">Register</div>
        <div class="auth_group">
            <input v-model="form.name" type="text" placeholder="Name" class="auth_input" :class="{error: $v.form.name.$error}" name="name" @focus="onFocus('name')" @blur="onBlur('name')">
            <div class="error-text" v-if="!$v.form.name.required && $v.form.name.$dirty">Name is required</div>
            <div class="error-text" v-if="!$v.form.name.minLength && $v.form.name.$dirty">Name must have at least {{$v.form.name.$params.minLength.min}} letters.</div>
        </div>
        <div class="auth_group">
            <input v-model="form.email" type="email" placeholder="email" class="auth_input" :class="{error: $v.form.email.$error || takenEmail}"  name="email" @focus="onFocus('email')" @blur="onBlur('email')">
            <div class="error-text" v-if="takenEmail">The email has already been taken.</div>
        </div>
        <div class="auth_group">
            <input v-model="form.password" type="password" placeholder="password" class="auth_input" :class="{error: $v.form.password.$error}" name="password" @focus="onFocus('password')" @blur="onBlur('password')">
            <div class="error-text" v-if="!$v.form.password.minLength && $v.form.password.$dirty">Password must have at least {{$v.form.password.$params.minLength.min}} characters.</div>
        </div>
        <div class="auth_group">
            <input v-model="form.password_confirmation" type="password" placeholder="Repeat password" class="auth_input" :class="{error: $v.form.password_confirmation.$error}" name="password_confirmation" @focus="onFocus('password_confirmation')" @blur="onBlur('password_confirmation')">
            <div class="error-text" v-if="!$v.form.password_confirmation.sameAs && $v.form.password_confirmation.$dirty">Password do not match.</div>
        </div>
        <div class="auth_group pos-flex-end">
            <button class="btn-theme" @click="register">Register</button>
        </div>

        <ul class="error-text" v-if="serverSideErrors.length > 0">
            <li v-for="(error, index) in serverSideErrors" :key="`register-error-${index}`">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';
import { required, minLength, email, sameAs } from 'vuelidate/lib/validators';

export default {
    name: "Register",

    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            },
            serverSideErrors: [],
            takenEmail: false,
        }
    },

    validations: {
        form: {
            name: {
                required,
                minLength: minLength(6)
            },
            email: {
                required,
                email
            },
            password: {
                required,
                minLength: minLength(6)
            },
            password_confirmation: {
                required,
                sameAs: sameAs('password')
            },
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
            this.$v.$touch();

            if (this.$v.$invalid) return;

            axios.post('/api/auth/register', this.form)
                .then(() => {
                    this.$router.push({name: 'Login'})
                })
                .catch(error => {
                    if (error.response && error.response.status === 422) {
                        console.log('Validation faild', error.response.data);

                        const errors = error.response.data.errors;

                        this.serverSideErrors = Object.keys(errors).map(key => errors[key][0]);
                        if (Object.keys(errors).includes('email')) {
                            this.takenEmail = true
                        }
                    } else {
                        alert('Registration faild, pleas try again.')
                        console.log('Faild to register', error)
                    }
                })
        }
    },
};
</script>