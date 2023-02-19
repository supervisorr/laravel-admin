import Vue from 'vue'
import VueMeta from 'vue-meta'
import PortalVue from 'portal-vue'
import {App, plugin} from '@inertiajs/inertia-vue'
import {InertiaProgress} from '@inertiajs/progress/src'

Vue.config.productionTip = false
Vue.mixin({methods: {route: window.route}})
Vue.use(plugin)
Vue.use(PortalVue)
Vue.use(VueMeta)
Vue.mixin(require('./base'))

InertiaProgress.init({
    delay: 0,
    color: '#5567FF'
})

// import '@/plugins/vue-meta'
// import '@/plugins/bootstrap-vue'
// import '@/plugins/vue-luma'
// import '@/plugins/fmv-layout'
// import '@/plugins/fmv-highlight'
// import '@/plugins/fmv-avatar'
// import '@/plugins/vue-luma'
// import '@/plugins/app'

import VCalendar from 'v-calendar';
import ipglobalKit from "@/Plugins/ipglobal.kit";
// import vuetify from "@/Plugins/vuetify";
import VueApexCharts from "vue-apexcharts";

Vue.component("apexchart", VueApexCharts);
// Vue.component("vuetify", vuetify);

Vue.use(VCalendar, {
    componentPrefix: 'vc',  // Use <vc-calendar /> instead of <v-calendar />
});
Vue.use(ipglobalKit);

const el = document.getElementById('app')

new Vue({
    metaInfo: {
        titleTemplate: title => (title ? `${title} - Laravel Admin. Ping CRM` : 'Laravel Admin. Ping CRM'),
    },
//    vuetify,
    render: h =>
        h(App, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(el)


// /*
//  * ============================
//  * File: main.js
//  * Project: egret-vue
//  * File Created: Thursday, 9th April 2020 2:11:05 am
//  * Author:UILIB
//  * AuthorUrl:https://themeforest.net/user/ui-lib
//  * -----
//  * Last Modified: Tuesday, 14th April 2020 7:17:10 pm
//  * Modified By: naime hossain (naime.hossain93@gmail.com)
//  * -----
//  * Copyright 2020 - 2020 UILIB, UILIB
//  * ============================
//  */
//
// import Vue from "vue";
// import App from "./App.vue";
// import router from "./router";
// import store from "./store";
//
// import vuetify from "./plugins/vuetify";
// import "./plugins";
// import { makeServer } from "../server";
//
// import egretKit from "@/plugins/egret.kit";
// import VueApexCharts from "vue-apexcharts";
// // mock
// import "./fake-db/index.js";
//
// import "animate.css";
//
//
// Vue.component("apexchart", VueApexCharts);
//
// Vue.use(egretKit);
// Vue.config.productionTip = false;
// // if (process.env.NODE_ENV === "development") {
// //   makeServer();
// // }
//
// new Vue({
//     store,
//     router,
//     vuetify,
//     render: h => h(App)
// }).$mount("#app");

