require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        friends: 'Your Friends',
        allFriends: [],
        allMessages: [],
        userTo: 0,
        content: "",
        convId: 0,
    },

    created() {
        axios.get('/larabook/public/index.php/getMessages')
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
            axios.get('/larabook/public/index.php/getMessage/'+id)
                 .then(response => {
                     console.log(response);
                     this.allMessages = response.data;
                     this.userTo = id;
                     if (this.allMessages == 'No messages!')
                        this.convId = 0;
                     else
                        this.convId = response.data[0].conversation_id;
                     console.log(this.userTo);
                     console.log(this.convId);
                 })
        },

        sendMessage() {
            //console.log(this.content);
            //this.content = "";
            axios.post('/larabook/public/index.php/sendMessage', {
                    convId: this.convId, userTo: this.userTo, content: this.content
                })
                .then(response => {
                    this.allMessages = response.data;
                    this.convId = response.data[0].conversation_id;
                    this.content = "";
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
});
