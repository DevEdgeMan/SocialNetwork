require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const msg_app = new Vue({
    el: '#msg_app',
    data: {
        friends: 'Your Friends',
        allFriends: [],
    },

    created() {
        axios.get('/getMessages')
             .then( response => {
                 console.log(response);
                 this.allFriends = response.data;
             })
             .catch(function(error) {
                 console.log(error);
             });
    },

    methods: {
        messages: function($id) {
            alert('showing messages from user ' + $id + '!');
        }
    }
});
