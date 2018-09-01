<template>
  <div>
    <img :src="this.item.image.url" @click="handleImageClick" />
  </div>
</template>

<script>
export default {
  props: {
    item: {
      required: true
    }
  },
  methods: {
    handleImageClick() {
     this.$emit('click', this.item);
    }
  }
}
</script>
