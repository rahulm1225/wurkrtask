<template>
    <div class="message self">
        <strong class="user">From: {{ message.from_user_first_name }} | To: {{ message.to_user_first_name }}</strong>
        <p class="body">{{ message.message }}</p>
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>

<style>
    .user {
        font-weight: 800;
    }
    .body {
        margin-bottom: 0;
        white-space: pre-wrap;
    }
    .message {
        border-bottom: 1px solid #000000
    }
    .self {
        background-color: #f0f0f0;
        padding: 10px;
    }
</style>