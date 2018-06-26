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
                    username: this.user.email,
                    password: this.user.password,
                }

                axios.post('/api/login', data)
                    .then(response => {
                        auth.login(response.data.token, response.data.user);
                        this.$router.push('/home');
                    })
                    .catch(response => {
                        console.log(response);
                        alert(response.data.message);
                    })
            }
        }
    }
</script>

<style scoped>

</style>