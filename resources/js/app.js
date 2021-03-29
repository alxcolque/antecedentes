
require('./bootstrap');

window.Vue = require('vue').default;
window.Fire = new Vue();


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('importar', require('./components/ImportarComponent.vue').default);

const app = new Vue({
    el: '#app',
});
