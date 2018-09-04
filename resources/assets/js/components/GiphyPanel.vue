<template>
  <div class="card">
    <div class="card-header">
      {{ $t('giphy.title') }}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $t('giphy.gif') }}</h5>
      <p class="card-text">{{ $t('giphy.feeling' )}}</p>
      <input @input="doSearch" :placeholder="$t('giphy.search')">
      <form @submit.prevent='handleSubmit'>
        <p v-show='items.length > 0'>Selected image: {{ selectedImage || 'No Image selected' }}</p>
        <button :disabled="!selectedId" class='form-button'>{{ $t('giphy.post') }}</button>
      </form>
      <div class='gif-holder text-center' v-show="items.length > 0">
        <giphy-image v-for="item in items" :key="item.id" :item="item" @click="handleImageSelected"></giphy-image>
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
      selectedId: null
    }
  },
  methods: {
    doSearch: _.debounce(function(e) {
      axios.get(`/api/giphy/${e.target.value}`).then((resp) => this.items = resp.data);
    }, 300),
    handleImageSelected({title, id}) {
      this.selectedImage = title;
      this.selectedId = id;
    },
    handleSubmit() {
      if(this.selectedId !== '') {
        axios.post('/api/post/create', {giphy_id: this.selectedId}).then(resp => location.reload());
      }
    }
  }
}
</script>
