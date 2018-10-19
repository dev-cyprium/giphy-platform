<template>
  <div>
    <nav class="new-post-nav">
      <slot name="navigation" :active-step="activeStep"></slot>
    </nav>

    <slot></slot>

    <button class="form-button" @click="prevTab()">
      Previous
    </button>
    <button class="form-button" @click="nextTab()">
      Next
    </button>
  </div>
</template>

<script>
export default {
  data() {
   return {
     activeStep: 0,
     steps: []
   } 
  },
  created() {
    this.steps = this.$children;
  },
  mounted() {
    this.sync();
  },
  methods: {
    prevTab() {
      this.activeStep--;
      if(this.activeStep < 0) {
        this.activeStep = 0;
      }
      this.sync();
    },
    nextTab() {
      this.activeStep++;
      if(this.activeStep > this.steps.length - 1) {
        this.activeStep = 0;
      }
      this.sync();
    },
    sync() {
      this.steps.forEach((step, i) => i === this.activeStep ? 
        step.shown = true : step.shown = false);
    }
  }
}
</script>
