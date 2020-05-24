import VueRouter from "vue-router";
import Bookable from "./bookable/Bookable";
import Bookables from "./bookables/Bookables";
import Review from "./review/Review";

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
    {
        path: "/review/:id",
        component: Review,
        name: "review"
    }
];

const router = new VueRouter({
    routes, // `routes: routes` の短縮表記
    mode: "history",
});

export default router;
