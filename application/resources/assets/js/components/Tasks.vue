<template>
    <div>
        <draggable v-model="tasks" style="min-height: 15px" :options="{group:'tasks'}" @add="onAdd" :boardId="board_id">
            <div v-for="task in list" class="task" :taskId="task.id">
                <p> Name: {{ task.name }}</p>
                <p>Description: {{ task.description }}</p>
                <button type="buttton" @click="deleteTask(task.id)">Delete</button>
            </div>
        </draggable>
        <task-create :board_id="board_id"></task-create>
    </div>


</template>

<script>
    import draggable from 'vuedraggable';
    export default {
        props: [
            'list',
            'board_id',
        ],
        components: {draggable},
        data() {
            return {
                tasks:'',
            }
        },
        created() {
            this.tasks = this.list;
        },
        updated(){
            this.tasks = this.list;
        },
        methods: {
            deleteTask(id){
                api.call('delete', '/api/tasks/'+ id + '/delete')
                    .then(response =>{
                        console.log(response.response);
                    }).catch(response =>{
                        console.log(response);
                        alert(response.data.message)
                });
                Event.$emit('boardChange');
            },
            onAdd(evt){
                console.log(evt);
                let taskId = evt.item.getAttribute('taskId');
                api.call('post', '/api/tasks/' + taskId + '/edit', {board_id: this.board_id})
                    .then(response => {
                        console.log(response);
                    }).catch(response =>{
                        console.log(response);
                        alert(response.data.message)
                })
                Event.$emit('boardChange');
            },
            onChange() {

            },
        }
    }
</script>