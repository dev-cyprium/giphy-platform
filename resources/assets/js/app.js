
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

let Vue = require('vue');

Vue.component('example', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: "#app"
});
/*
    Processing for GIF choooser
*/
String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

function formatGif(original) {
    let replacerRegex = /^(.*)(GIF.*)$/;
    return original.replace(replacerRegex, "$1").capitalize();
}

function choose(container, data) {
    $("#chosen-gif").html("<strong>Choosen GIF: </strong>" + formatGif(data.title));
    $("#chosen-gif-id").val(data.id);
}

function processImages(images) {
    let container = $(".gif-holder");
    container.html("");
    images.forEach((data) => {
        let img = $("<img>").attr("src", data.image.url);
        img.click(() => choose(container, data));
        container.append(img);
    });
}

function processSearchGif() {
    let term = $("#gif-search").val();
    axios.get(`/api/giphy/${term}`).then((resp) => processImages(resp.data));
}

$(document).ready(function() {
    $("#gif-search").on('keyup', _.debounce(processSearchGif, 250));
    $("#gif-search").blur(processSearchGif);
});