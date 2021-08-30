import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import GuestGuard from "./guards/GuestGuard";
// import AuthGuard from './guards/AuthGuard'

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    // beforeEnter: AuthGuard
  },
  {
    path: "/about",
    name: "About",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/About.vue"),
  },
  {
    path: "/register",
    name: "Register",
    beforeEnter: GuestGuard,
    component: () => import("../views/auth/Register.vue"),
  },
  {
    path: "/login",
    name: "Login",
    beforeEnter: GuestGuard,
    component: () => import("../views/auth/Login.vue"),
  },
];

const router = new VueRouter({
  routes,
});

export default router;
