import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import About from "./pages/About.vue";
import Contact from "./pages/Contact.vue";
import PostsShow from "./pages/posts/Show.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
            meta: {
                title: "La tua Homepage"
            }
        },
        {
            path: "/about/:slug",
            name: "about.show",
            component: About
        },
        {
            path: "/contact/:slug",
            name: "contact.show",
            component: Contact
        },
        {
            path: "/posts/:slug",
            name: "posts.show",
            component: PostsShow
        }
    ]
});

export default router;