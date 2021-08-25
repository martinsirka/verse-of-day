<template>
    <div id="nav" class="nav-inactive">
      <div>
        <router-link to="/">Home</router-link>
        <router-link to="/about">About</router-link>
      </div>
      <div>
        <router-link :to="{name: 'Login'}">Login</router-link>
        <router-link :to="{name: 'Register'}">Register</router-link>
      </div>
    </div>    
</template>