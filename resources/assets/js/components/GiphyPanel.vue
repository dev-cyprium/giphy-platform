<template>
  <div class="card">
    <div class="card-header">
      I'm feeling like...
    </div>
    <div class="card-body">
      <h5 class="card-title">Gifonize yourself!</h5>
      <p class="card-text">Choose a gif that represents your feelings of the moment.</p>
      <input @input="doSearch">

      <p id='chosen-gif'></p>
    <form method="POST" action="#">
          <input id='chosen-gif-id' type='hidden' name='giphy_id' value=''>
          <button class='btn btn-primary'>Post</button>
        </form>
        <div class='gif-holder text-center' v-show="items.length > 0">
          <giphy-image v-for="item in items" :key="item.id" :item="item"></giphy-image>
        </div>
    </div>
  </div>
</template>

<style scoped>

</style>

<script>
export default {
  data() {
    return {
      items: []
    }
  },
  methods: {
    doSearch: _.debounce(function(e) {
      axios.get(`/api/giphy/${e.target.value}`).then((resp) => this.items = resp.data);
    }, 300)
  }
}
</script>
