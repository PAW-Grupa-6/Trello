<template>
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dodaj tablice</div>
                <div class="card-body">
                    <form v-on:submit.prevent="save()">
                        <label>Nazwa tablicy</label>
                        <input v-model="board.table_name" type="text">
                        <input type="hidden" name="_token" :value="csrf">
                        <button class="btn">Dodaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                board: {
                    table_name: '',
                },
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        methods: {
            save() {
                axios.post('boards', this.board)
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