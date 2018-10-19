<template>
  <div v-show="shown">
    <slot :d="textData" :mutator="mutator"></slot>
  </div>
</template>

<script>
export default {
  data() {
    return {
      shown: false,
      textData: ''
    }
  },
  methods: {
    mutator(newTextData) {
      this.textData = newTextData;
    }
  }
}
</script>
