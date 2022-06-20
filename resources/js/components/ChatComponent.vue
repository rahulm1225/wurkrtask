<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Chats</div>
            <div class="card-body">
                <chat-messages-component></chat-messages-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>