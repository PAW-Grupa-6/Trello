<template>
    <div>
        <div v-for="task in list" class="task" draggable="true">
            <p> Name: {{ task.name }}</p>
            <p>Description: {{ task.description }}</p>
            <button type="buttton" @click="deleteTask(task.id)">Delete</button>
        </div>
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
        mounted() {

        },
        created(){
        },
        methods: {
            deleteTask(id){
                api.call('delete', '/api/tasks/'+ id + '/delete')
                    .then(response =>{
                        console.log(response.response);
                        Event.$emit('boardChange');
                    })
            },

            onAdd () {

            },
            onChange() {

            },
        }
    }
</script>