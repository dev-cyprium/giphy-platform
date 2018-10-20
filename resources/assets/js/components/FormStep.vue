<template>
  <div v-show="shown">
    <slot></slot>
  </div>
</template>

<script>
export default {
  data() {
    return {
      shown: false,
    }
  }
}
</script>
