<template>
  <div>
    <img :src="this.item.image.url" />
  </div>
</template>

<script>
export default {
  props: {
    item: {
      required: true
    }
  }
}
</script>
