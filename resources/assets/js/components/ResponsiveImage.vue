<template>
  <img class='responsive-image' :src="url" />
</template>

<script>
export default {
  props: {
    'url': { required: true }
  }
}
</script>
