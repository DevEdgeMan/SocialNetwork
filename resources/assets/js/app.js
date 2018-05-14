
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        editpost: 'Edit New Post',
        content: "",
        posts: []
    },

    created() {
        axios.get('/larabook/public/index.php/posts')
            .then(response => {
                console.log(response);
                this.posts = response.data;
            })
            .catch(function(error) {
                console.log(error);
            });
    },

    methods: {
        addPost() {
            axios.post('/larabook/public/index.php/addPost', {
                    content: this.content
                })
                .then(response => {
                    console.log(response);
                    this.content = "";
                    this.posts = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
});
