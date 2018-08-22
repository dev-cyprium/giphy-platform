<template>
    <modal :show="'new-report-modal' == openModal" @close="close" >
        <div class="modal-header">
            <h3>Report</h3>
        </div>
        <div class="modal-body">
            <div class='form-group'>
                <label>
                    Description
                </label>
                <textarea v-model="description" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer text-right">
            <button class="btn btn-primary" @click="report()">
                Submit
            </button>
        </div>
    </modal>
</template>

<style>
.modal-header h3 {
    margin-top: 0;
    color: #42b983;
}
</style>

<script>
    export default {
        props: ['openModal'],
        data: function() {
            return {
                description: ''
            }
        },
        methods: {
            report: function() {
                this.close();
            },
            close: function() {
                this.$emit('close');
                this.description = '';
            }
        }
    }
</script>
