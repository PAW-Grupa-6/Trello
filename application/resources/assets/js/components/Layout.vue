<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div>TRELLO</div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" v-if="authenticated && user">
                        <router-link tag="li" :to="{ name: 'home' }">
                            <a class="nav-link">Home</a>
                        </router-link>
                        <router-link tag="li" :to="{ name: 'board' }">
                            <a class="nav-link">Boards</a>
                        </router-link>
                        <li><button class="nav-link" v-on:click="logout">Logout</button></li>
                    </ul>
                    <ul class="navbar-nav ml-auto" v-else>
                        <router-link tag="li" :to="{ name: 'register' }">
                            <a class="nav-link">Register</a>
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
                authenticated: auth.check(),
                user: auth.user
            }
        },
        mounted() {
            Event.$on('userLoggedIn', () => {
                this.authenticated = true;
                this.user = auth.user;
            });

            Event.$on('userLoggedOut', () => {
                this.authenticated = false;
                this.user = auth.user;
            });

        },
        methods: {
            logout() {
                var data = {id: this.user.id};
                axios.post('/api/logout', data)
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        console.log(error.response);
                    })
                auth.logout();
                this.$router.push('/login');
            }
        }


    }
</script>
