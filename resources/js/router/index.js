const routes = [
    {
        path: "/",
        component: () => import("../vue/admin/Dashboard.vue"),
    },
    {
        path: "/about",
        component: () => import("../home/About.vue"),
    },
];

export default routes;
