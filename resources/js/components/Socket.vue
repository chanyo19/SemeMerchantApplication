<template>
    <div>
        <h1>Web sockets</h1>
    </div>
</template>

<script>


    export default {
        name: "socket-file",
        mounted() {

            Echo.private('message.1')
                .listen('SendMessage', (e)=> {
                    console.log(e);
                   // console.log('hii');
                });
        }
    }
</script>

<style scoped>

</style>