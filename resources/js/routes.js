import VueRouter from "vue-router";
import Bookable from "./bookable/Bookable";
import Bookables from "./bookables/Bookables";

const routes = [{
        path: "/",
        component: Bookables,
        name: "home",
    },
    {
        path: "/bookable/:id",
        component: Bookable,
        name: "bookable",
    },
];

const router = new VueRouter({
    routes, // `routes: routes` の短縮表記
    mode: "history",
});

export default router;
