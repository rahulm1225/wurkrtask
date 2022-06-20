<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <h5>Search Message</h5>
                <input type="text" class="form-control" v-model="search" placeholder="Search Messages.."/>
            </div>
            <div class="col-md-4">
                <h5>From User</h5>
                <select class="form-control" v-model="fromuser">
                    <option value="">None</option>
                    <option v-for="fromuser in users" v-bind:value="fromuser._id" >{{ fromuser.first_name }}</option>
                </select> 
            </div>
            <div class="col-md-4">
                <h5>To User</h5>
                <select class="form-control" v-model="touser">
                    <option value="">None</option>
                    <option v-for="fromuser in users" v-bind:value="fromuser._id" >{{ fromuser.first_name }}</option>
                </select> 
            </div>
        </div>

        <div>
            <message-component 
                v-for="message in filteredMessages" 
                :key="message.id" 
                :message="message">
            </message-component>
            <infinite-loading spinner="waveDots" @infinite="infiniteHandler">
                <span slot="no-more"></span>
            </infinite-loading>
        </div>
    </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';

    export default {
        data() {
            return {
                messages: [],
                users:[],
                page: 1,
                search:'',
                fromuser:'',
                touser:''
            };
        },
        computed: {
            filteredMessages: function() {
                return this.filterMessagesByTerm(this.filterMessagesByFromUser(this.filterMessagesByToUser(this.messages)))
            },
        },
        methods: {

            filterMessagesByTerm: function(messages) {
                return messages.filter(message => message.message.toLowerCase().match(this.search))
            },

            filterMessagesByFromUser: function(messages){
                return messages.filter(message => !message.from_user_id.indexOf(this.fromuser))
            },

            filterMessagesByToUser: function(messages){
                return messages.filter(message => !message.to_user_id.indexOf(this.touser))
            },

            infiniteHandler($state) {
                let timeOut = 0;
                if (this.page > 1) {
                    timeOut = 1000;
                }
                setTimeout(() => {
                    let vm = this;
                    window.axios.get('/api/messages?page='+this.page).then(({ data }) => {
                        vm.lastPage = data.last_page;
                        $.each(data.data, function(key, value){
                            vm.messages.push(value);        
                        });
                        if (vm.page - 1 === vm.lastPage) {
                            $state.complete();
                        }
                        else {
                            $state.loaded();
                        }
                    });
                    this.page = this.page + 1;
                }, timeOut);
            },

            getUsers(){
                axios.get('/api/users')
                .then((response) => {
                    this.users = response.data;
                })
                .catch( function () {
                    console.log(error);
                });
            },

        },
        components: {
            InfiniteLoading,
        },
        mounted() {
            this.getUsers();
        }
    }
</script>

<style>
    .message-area {
        height: 600px;
        max-height: 600px;
        overflow-y: scroll;
        padding: 15px;
        border-bottom: 1px solid #eee;
    }
</style>