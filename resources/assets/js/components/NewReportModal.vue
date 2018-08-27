<template>
    <modal :show="'new-report-modal' === openModal" @close="close" >
        <div class="modal-header">
            <h3>Report</h3>
        </div>
        <div class="modal-body">
            <div class='form-group'>
                <label>
                    Description
                </label>
                <textarea @input="onInput()" v-model="description" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <div class="w-100">
                <p>{{ charactersLeft }}</p>
            </div>
            <button class="btn btn-primary" :disabled="charactersUsed > maxCharacters" @click="report()">
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

.modal-footer p {
    font-size: 1.6rem;
}
</style>

<script>
    export default {
        props: ['openModal'],
        data: function() {
            return {
                description: '',
                charactersUsed: 0
            }
        },
        computed: {
            charactersLeft() {
                return Math.max(0, this.maxCharacters - this.charactersUsed);
            },
            maxCharacters: () => 50
        },
        methods: {
            report() {
                this.close();
            },
            close() {
                this.$emit('close');
                this.description = '';
            },
            onInput() {
                this.charactersUsed = this.description.length;
            }
        }
    }
</script>
