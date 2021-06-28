import Vue from "vue";
import VueRouter from "vue-router";
import Home from "./pages/Home.vue";
import About from "./pages/About.vue";
import Blog from "./pages/Blog.vue";
import NotFound from "./pages/NotFound.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    routes: [
        {
            path: "/",
            component: Home,
            name: "home"
        },
        {
            path: "/about",
            component: About,
            name: "about"
        },
        {
            path: "/blog",
            component: Blog,
            name: "blog"
        },
        {
            path: "*",
            component: NotFound,
            name: "notfound"
        }
    ]
});

export default router;
