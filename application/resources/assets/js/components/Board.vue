<template>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My boards</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="board" v-for="board in boards">
                                <input type="text" v-model="boardName" v-if="updateBoardId == board.id" @keyup.enter="updateBoard" @keyup.27="updateBoardId=null; boardName=null" />
                                <p @click.stop="updateBoardId = board.id; boardName=board.table_name" v-else>[ {{ board.id }}]{{ board.table_name }}</p>
                                <button type="button" @click="deleteBoard(board.id)">Delete</button>
                                <tasks :list="board.tasks" :board_id="board.id"></tasks>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <paginate
                                        :page-count="pageCount"
                                        :page-range="pageCount"
                                        :click-handler="readBoards"
                                        :prev-text="'<'"
                                        :next-text="'>'"
                                        :container-class="'pagination'"
                                        :page-class="'page-item'"
                                        :page-link-class="'page-link'"
                                        :prev-class="'page-item'"
                                        :prev-link-class="'page-link'"
                                        :next-class="'page-item'"
                                        :next-link-class="'page-link'"
                                        ref="paginate">
                                </paginate>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <board-create></board-create>
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
                boards: [],
                boardName: '',
                updateBoardId:'',
                pageCount: 1,
                endpoint: '/api/boards?page=',
            }
        },
        mounted() {
            this.readBoards();

            Event.$on('boardChange', () => {
                console.log('eventyttt');
                this.$refs.paginate.selected = this.boards.length -1 ? this.$refs.paginate.selected : this.$refs.paginate.selected -1;
                this.readBoards(this.$refs.paginate.selected + 1);
            });
        },
        methods: {
            readBoards(page = 1) {
                api.call('get', this.endpoint + page)
                    .then(response => {
                        console.log(response);
                        this.boards = response.data.boards.data;
                        this.pageCount = response.data.boards.last_page
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },

            updateBoard() {
                api.call('post', '/api/boards/'+ this.updateBoardId +'/edit', {table_name: this.boardName})
                    .then(response => {
                        this.updateBoardId = '';
                        this.boardName = '';
                        Event.$emit('boardChange');
                    }).catch(response =>{
                        console.log(response);
                        alert(response.data.message)
                })

            },
            deleteBoard(id) {
                api.call('delete', '/api/boards/'+ id + '/delete')
                    .then(response =>{
                        console.log(response.response);
                        Event.$emit('boardChange');
                    })
            }
        }
    }
</script>