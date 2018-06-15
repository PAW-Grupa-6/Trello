<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div>{{ env.MIX_PUSHER_APP_CLUSTER }}323</div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <router-link tag="li" :to="{ name: 'home' }">
                            <a class="nav-link">Home</a>
                        </router-link>
                        <router-link tag="li" :to="{ name: 'login' }">
                            <a class="nav-link">Login</a>
                        </router-link>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <router-view></router-view>
        </main>
    </div>




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