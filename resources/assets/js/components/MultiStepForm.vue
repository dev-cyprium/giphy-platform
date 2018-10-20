<template>
  <div>
    <nav class="new-post-nav">
      <slot name="navigation" :active-step="activeStep"></slot>
    </nav>

    <slot :mutator="mutate" :d="activeStepData"></slot>

    <button class="form-button" @click="prevTab()">
      {{ $t("button.next") }}
    </button>
    <button class="form-button" @click="nextTab()" :disabled="!activeStepData">
      {{ $t("button.prev") }}
    </button>
  </div>
</template>

<script>
export default {
  data() {
   return {
     activeStep: 0,
     steps: [],
     filledData: []
   } 
  },
  created() {
    this.steps = this.$children;
  },
  mounted() {
    this.sync();
    this.steps.forEach((_, i) => this.filledData.push({step: i, userData: ""}));
  },
  computed: {
    activeStepData() {
     if(this.filledData.length > 0) {
       const { userData } = this.filledData[this.activeStep];
       return userData;
     }
     return "";
    }
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
    },
    mutate(nextData) {
      this.filledData[this.activeStep].userData = nextData;
    }
  }
}
</script>
