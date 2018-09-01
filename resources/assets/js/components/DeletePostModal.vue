<template>
    <modal :show="'delete-post-modal' === openModal" @close="close">
        <div class="modal-header">
            <h3>Delete Post?</h3>
        </div>
        <div class="modal-body">
            <p>
                Deleting a post permanently removes it from your post 
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger">
                Yes, Delete Post
            </button>
        </div>
    </modal>
</template>

<script>
    export default {
        props: ['openModal'],
        methods: {
            close() {
                this.$emit('close');
            }
        }
    }
</script>
