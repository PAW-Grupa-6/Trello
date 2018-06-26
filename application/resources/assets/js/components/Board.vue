<template>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Moje tablice</div>
                    <div class="card-body">
                        <p v-for="board in boards">{{ board.table_name  }}</p>
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
                                :next-link-class="'page-link'">
                        </paginate>
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
                pageCount: 1,
                endpoint: '/api/boards?page=',
            }
        },
        mounted() {
            this.readBoards();
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
                        console.log(error.response)
                    });
            },
        }
    }
</script>