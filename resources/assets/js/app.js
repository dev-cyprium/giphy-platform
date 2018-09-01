
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import Vue from 'vue';
import Vuex from 'vuex';
import vuexI18n from 'vuex-i18n';

Vue.use(Vuex);
const store = new Vuex.Store();
Vue.use(vuexI18n.plugin, store);

const translationsEn = {
    giphy: {
        title: "I'm feeling like...",
        gif: "Giphonize yourself",
        feeling: "Choose a gif that represents your feelings of the moment."
    }
};

const translationsSr = {
    giphy: {
        title: "Osećam se kao...",
        gif: "Izrazi se kroz Gif!",
        feeling: "Izaberi gif koji odgovora tvom raspolozenju."
    }
};

/* Localization */
Vue.i18n.add('en', translationsEn);
Vue.i18n.add('sr', translationsSr);

/* Components */
Vue.component('modal', require('./components/Modal'));
Vue.component('new-report-modal', require('./components/NewReportModal'));
Vue.component('delete-post-modal', require('./components/DeletePostModal'));
Vue.component('giphy-panel', require('./components/GiphyPanel'));
Vue.component('giphy-image', require('./components/GiphyImage'))

const app = new Vue({
    store,
    el: "#app",
    data: {
        activeModal: ''
    }
});

Vue.i18n.set('en'); // default to english
axios.get('/localization').then(resp => {
    Vue.i18n.set(resp.data.locale);    
});


