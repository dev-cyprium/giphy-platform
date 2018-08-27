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
                <textarea :class="[{'is-invalid': charactersLeft == 0}, 'form-control']" @input="onInput()" v-model="description" rows="5" ></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <div class="w-100">
                <p :class="{'text-danger': charactersLeft <= 10}">{{ charactersLeft }}</p>
            </div>
            <button class="btn btn-primary" :disabled="charactersUsed > maxCharacters" @click="report()">
                Submit
            </button>
        </div>
    </modal>
</template>

<style scoped>
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
                axios.post('/api/report', {description: this.description})
                    .then(resp => console.log(resp))
                    .catch(err => console.log(err));
                this.close();
            },
            close() {
                this.$emit('close');
                this.description = '';
                this.charactersUsed = 0;
            },
            onInput() {
                this.charactersUsed = this.description.length;
            }
        }
    }
</script>
