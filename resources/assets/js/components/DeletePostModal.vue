<template>
    <modal v-show="manager.isModalActive('delete-post-modal')" @close="close">
        <div class="modal-header">
            <h3>Delete Post?</h3>
        </div>
        <div class="modal-body">
            <p>
                Deleting a post permanently removes it from your lists of posts.
            </p>
        </div>
        <div class="modal-footer">
            <button @click="close" class="btn btn-primary">
                No, Cancel
            </button>
            <button @click="deletePost" class="btn btn-danger">
                Yes, Delete Post
            </button>
        </div>
    </modal>
</template>

<script>
    export default {
        props: {
            manager: {required: true}
        },
        methods: {
            close() {
                this.manager.close();
            },
            deletePost() {
                let id = this.manager.getData();
                axios.delete(`/post/${id}`)
                    .then(() => console.log('Success!'))
                    .catch(() => console.log('Failed!'));
                this.close();
                window.location.reload();
            }
        }
    }
</script>
