import store from "../../store";

export default (to, from, next) => {
  if (store.state.auth.accessToken !== null) {
    next();
  } else {
    next({ name: "Home" });
  }
};
