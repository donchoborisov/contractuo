require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import Root from "./components/Root";

import Dashboard from "./components/Dashboard";
import ContractCreate from "./components/ContractCreate";
import Contracts from "./components/Contracts";
import ContractEdit from "./components/ContractEdit";


console.log(window.user);




Vue.use(VueRouter);


const routes = {
    mode: "history",

    routes: [
        {
            path: "/overview/dashboard",
            name: "dashboard",
            component: Dashboard,
        },
        {
            path:"/create",
            name:"create",
            component: ContractCreate,
        },
        {
            path:"/contracts",
            name:"contracts",
            component: Contracts,
        },
        {
            path:'/contract/:id',
            name:'edit-contract',
            component: ContractEdit
        },



    ],
};

const router = new VueRouter(routes);

new Vue({
    el: "#app",
    router,
    components: { Root },
});
