<template>
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add task</div>
                <div class="card-body">
                    <form v-on:submit.prevent="save()">
                        <div class="form-group">
                            <label>Task name</label>
                            <input v-model="task.name" type="text">
                        </div>
                        <div class="form-group">
                            <label>Task descrption</label>
                            <input v-model="task.description" type="text">
                        </div>
                        <button class="btn">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'board_id'
        ],
        data() {
            return {
                task: {
                    name: '',
                    description: '',
                    board_id: '',
                }
            }
        },
        created() {
          this.task.board_id = this.board_id;
          console.log(this.board_id);
        },
        methods: {
            save() {
                this.task.board_id = this.board_id;
                api.call('post', '/api/tasks/create', this.task)
                    .then(response => {
                        console.log(response);
                        Event.$emit('boardChange');
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        }
    }
</script>

<style scoped>

</style>