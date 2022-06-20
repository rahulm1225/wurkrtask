<template>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Users</div>
            <div class="card-body users-area">
                <a href="#">Get All Messages</a>
                <div class="users" v-for="user in users" :key="user.id">
                    <a href="#">{{user.first_name}}</a>
                </div>
                <infinite-loading></infinite-loading>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: [],
                page: 1,
            };
        },
        mounted() {
            axios.get('/api/users')
            .then((response) => {
                this.users = response.data;
            })
            .catch( function () {
                console.log(error);
            });
        }
    }
</script>

<style>
    .users {
        background-color: #fff;
        border-radius: 3px;
    }
    .users-area {
        height: 400px;
        max-height: 400px;
        overflow-y: scroll;
        padding: 15px;
        border-bottom: 1px solid #eee;
    }
</style>