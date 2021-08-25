<template>
    <div class="auth_wrapper">
        <div class="auth_title">Register</div>
        <div class="auth_group">
            <input type="text" placeholder="Name" class="auth_input" name="name" @focus="onFocus('name')" @blur="onBlur('name')">
        </div>
        <div class="auth_group">
            <input type="email" placeholder="email" class="auth_input" name="email" @focus="onFocus('email')" @blur="onBlur('email')">
        </div>
        <div class="auth_group">
            <input type="password" placeholder="password" class="auth_input" name="password" @focus="onFocus('password')" @blur="onBlur('password')">
        </div>
        <div class="auth_group">
            <input type="repeat_password" placeholder="Repeat password" class="auth_input" name="repeat_password" @focus="onFocus('repeat_password')" @blur="onBlur('repeat_password')">
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",

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