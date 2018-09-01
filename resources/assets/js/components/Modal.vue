<template>
  <transition name="modal">
    <div class="modal-mask" @click="close" v-show="opened">
        <div class="modal-container" @click.stop>
            <slot></slot>
        </div>
    </div>
  </transition>
</template>

<style>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    transition: opacity .4s ease;
}

.modal-container {
    width: 400px;
    margin: 40px auto 0;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
    transition: all .4s ease;
    font-family: Helvetica, Arial, sans-serif;
}

.modal-body {
    margin: 20px 0;
}

.modal-open {
    overflow: hidden;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>

<script>
    export default {
        props: ['show'],
        methods: {
            close: function() {
                $('body').removeClass('modal-open');
                this.$emit('close');
            }
        },
        computed: {
            opened: function() {
                if(this.show) {
                    $('body').addClass('modal-open');
                }
                return this.show;
            }
        },
        mounted: function() {
            document.addEventListener('keydown', (e) => {
                if(this.show && e.keyCode == 27) {
                    this.close();
                }
            });
        }
    }
</script>