<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form v-on:submit.prevent="Register()">
                            <label>Name</label>
                            <input v-model="user.name" type="text">
                            <label>Email</label>
                            <input v-model="user.email" type="text">
                            <label>Password</label>
                            <input v-model="user.password" type="password"/>
                            <button class="btn">Register</button>
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
                    name: '',
                    email: '',
                    password: '',
                },
            }
        },
        methods: {
            Register() {
                var data = {
                    name: this.user.name,
                    email: this.user.email,
                    password: this.user.password,
                }

                axios.post('/api/register', data)
                    .then(response => {
                        console.log(response);
                        this.$router.push('/login');
                    })
                    .catch(error => {
                        alert(error.response.data.message);
                        console.log(error.response);
                    })
            }
        }
    }
</script>

<style scoped>

</style>
