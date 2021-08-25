<template>
    <div class="auth_wrapper">
        <div class="auth_title">Login</div>
        <div class="auth_group">
            <input type="email" placeholder="email" class="auth_input" name="email" @focus="onFocus('email')" @blur="onBlur('email')">
        </div>
        <div class="auth_group">
            <input type="password" placeholder="password" class="auth_input" name="password" @focus="onFocus('password')" @blur="onBlur('password')">
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",

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
        }
    },
};
</script>