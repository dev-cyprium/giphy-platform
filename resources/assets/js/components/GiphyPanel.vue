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
        <form @submit.prevent='handleSubmit'>
          <p v-show='items.length > 0'>Selected image: {{ selectedImage || 'No Image selected' }}</p>
          <button :disabled="selectedId === ''" class='btn btn-primary'>Post</button>
        </form>
        <div class='gif-holder text-center' v-show="items.length > 0">
          <giphy-image v-for="item in items" :key="item.id" :item="item" @click='handleImageSelected'></giphy-image>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],
      selectedImage: '',
      selectedId: ''
    }
  },
  methods: {
    doSearch: _.debounce(function(e) {
      axios.get(`/api/giphy/${e.target.value}`).then((resp) => this.items = resp.data);
    }, 300),
    handleImageSelected(giphyItem) {
      this.selectedImage = giphyItem.title;
      this.selectedId = giphyItem.id;
    },
    handleSubmit() {
      // handle submit
    }
  }
}
</script>
