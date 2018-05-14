require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        friends: 'Your Friends',
        allFriends: [],
        allMessages: [],
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
        messages: function(id) {
            //alert('showing messages from user ' + $id + '!');
            axios.get('/getMessage/'+id)
                 .then(response => {
                     console.log(response);
                     this.allMessages = response.data;
                     console.log(this.allMessages);
                 })
        }
    }
});
