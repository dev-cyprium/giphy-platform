<template>
  <div>
    <nav class="new-post-nav">
      <slot name="navigation" :active-step="activeStep"></slot>
    </nav>

    <slot :mutator="mutate" :d="activeStepData"></slot>

    <button class="form-button" @click="prevTab()">
      {{ $t("button.prev") }}
    </button>
    <button class="form-button" @click="nextTab()" :disabled="!(activeStepData || lastStep())">
      {{ nextButtonText }}
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
    },
    nextButtonText() {
      if(this.lastStep()) {
        return this.$t("button.finish");
      }
      return  this.$t("button.next");
    }
  },
  methods: {
    reset() {
      this.activeStep = 0;
      this.filledData = [];
      this.steps.forEach((_, i) => this.filledData.push({step: i, userData: ""}));
      this.sync();
    },
    lastStep() {
      return this.steps.length-1 == this.activeStep
    },
    prevTab() {
      this.activeStep--;
      if(this.activeStep < 0) {
        this.activeStep = 0;
      }
      this.sync();
    },
    nextTab() {
      if(this.lastStep()) {
        this.$emit('submit', this.filledData);
        this.reset();
        return;
      }

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
