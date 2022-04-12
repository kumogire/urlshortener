/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import router from './router';
import App from './layouts/App.vue';

/* application routes */
import VueRouter from 'vue-router';
Vue.use(VueRouter);

/* axios component handles api calls */
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

/* font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faCopy as farCopy } from '@fortawesome/free-regular-svg-icons';
import { faTrashCan as farTrashCan } from '@fortawesome/free-regular-svg-icons';
library.add(farCopy, farTrashCan);
Vue.component('font-awesome-icon', FontAwesomeIcon);

/* import for alert component */
import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);

/* import for bootstrap elements */
import {
    Button,
    HasError,
    AlertError,
    AlertErrors,
    AlertSuccess
} from 'vform/src/components/bootstrap4'
Vue.component(Button.name, Button)
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertErrors.name, AlertErrors)
Vue.component(AlertSuccess.name, AlertSuccess)

// Component
Vue.component('shortenerform-component', require('./components/ShortenerFormComponent.vue').default);

const app = new Vue({
    router,
    el: '#app',
    render: h => h(App)
});

