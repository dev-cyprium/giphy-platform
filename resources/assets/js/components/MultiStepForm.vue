<template>
  <div>
    <nav class="new-post-nav">
      <slot name="navigation" :active-step="activeStep"></slot>
    </nav>

    <slot></slot>
    <h2>My active step: 
      <small>{{ activeStep+1 }}</small>
    </h2>

    <button @click="selectTab()">
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
    selectTab() {
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
