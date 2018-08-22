<template>
    <modal :show="'new-report-modal' == openModal" @close="close" >
        <div class="modal-header">
            <h3>Report</h3>
        </div>
        <div class="modal-body">
            <label class="form-label">
                Description
                <textarea v-model="description" rows="5" class="form-control"></textarea>
            </label>
        </div>
        <div class="modal-footer text-right">
            <button class="btn btn-primary" @click="savePost()">
                Save
            </button>
        </div>
    </modal>
</template>

<script>
    export default {
        props: ['openModal'],
        data: function() {
            return {
                description: ''
            }
        },
        methods: {
            savePost: function() {
                this.close();
            },
            close: function() {
                this.$emit('close');
                this.description = '';
            }
        }
    }
</script>
