
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import Vue from 'vue';
import Vuex from 'vuex';
import vuexI18n from 'vuex-i18n';
import modalManager from './utils/modal_manager';

Vue.use(Vuex);
const store = new Vuex.Store();
Vue.use(vuexI18n.plugin, store);

const translationsEn = {
    giphy: {
        title: "Giphonize yourself",
        feeling: "Choose a gif that represents your feelings of the moment.",
        search: "Search Gifs",
        post: "Post"
    }
};

const translationsSr = {
    giphy: {
        title: "Izrazi se kroz Gif!",
        feeling: "Izaberi gif koji odgovora tvom raspolozenju.",
        search: "Pretraži Gifove",
        post: "Objavi"
    }
};

/* Localization */
Vue.i18n.add('en', translationsEn);
Vue.i18n.add('sr', translationsSr);
Vue.i18n.set('en'); // default locale

/* Components */
Vue.component('modal', require('./components/Modal'));
Vue.component('new-report-modal', require('./components/NewReportModal'));
Vue.component('delete-post-modal', require('./components/DeletePostModal'));
Vue.component('giphy-panel', require('./components/GiphyPanel'));
Vue.component('giphy-image', require('./components/GiphyImage'))
Vue.component('multi-step-form', require('./components/MultiStepForm'));
Vue.component('form-step', require('./components/FormStep'));
Vue.component('sticky', {
    props: ['class-list'],
    data() {
        return {
            lastScrollTop: window.pageYOffset,
            deltaScroll: 0,
            offsetTop: 0,
            calculatedPosition: 0
        };
    },
    created() {
        window.addEventListener('scroll',() => {
            this.deltaScroll = -(this.lastScrollTop - window.pageYOffset);
            this.lastScrollTop = window.pageYOffset;

            this.calculatedPosition += this.deltaScroll;
        });
    },
    mounted() {
        this.offsetTop = this.$el.offsetTop;
    },
    render(h) {
        const { scrollTop, offsetTop } = this;
        return h('div', {class: JSON.parse(this.classList), style: {transform: `translateY(${this.calculatedPosition}px)`}}, this.$slots.default);
    },
});


const app = new Vue({
    store,
    el: "#app",
    data: {
        activeModal: '',
        modalManager: modalManager
    }
});

axios.get('/localization').then(resp => {
    Vue.i18n.set(resp.data.locale);    
});


