<template>
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add board</div>
                <div class="card-body">
                    <form v-on:submit.prevent="save()">
                        <label>Board name</label>
                        <input v-model="board.table_name" type="text">
                        <button class="btn">Add</button>
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
                }
            }
        },
        methods: {
            save() {
                api.call('post', '/api/boards/create', this.board)
                    .then(response => {
                        console.log(response);
                        Event.$emit('boardChange');
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