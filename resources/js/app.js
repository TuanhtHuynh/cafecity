require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import App from "./vue/App";
import routes from "./router";
import store from "./store";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: routes,
    mode: "history",
    base: "http://localhost:8000",
});

new Vue({
    el: "#app",
    render: (h) => h(App),
    router: router,
    store,
});
