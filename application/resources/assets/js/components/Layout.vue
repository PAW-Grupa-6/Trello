<template>

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <div>{{ env.MIX_PUSHER_APP_CLUSTER }}</div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


        </div>
    </nav>

</template>

<script>
    export default {
        data() {
            return {
                env: process.env,
            }
        },

    }
</script>