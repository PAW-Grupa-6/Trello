<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form v-on:submit.prevent="login()">
                            <label>Email</label>
                            <input v-model="user.email" type="text">
                            <label>Password</label>
                            <input v-model="user.password" type="password"/>
                            <button class="btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    email: '',
                    password: '',
                },
            }
        },
        methods: {
            login() {
                var data = {
                    client_id: 2,
                    client_secret: 'hpMvK84sVpMaPQTZGNhlsA8VyRoiKgoZYMinrETp',
                    grant_type: 'password',
                    username: this.user.email,
                    password: this.user.password,
                }

                axios.post('/oauth/token', data)
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        console.log(error.response);
                    })
            }
        }
    }
</script>

<style scoped>

</style>