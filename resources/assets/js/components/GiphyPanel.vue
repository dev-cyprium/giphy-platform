<template>
  <div class="choose-gif">
    <div class="choose-gif__group">
      <p class="choose-gif__desc">{{ $t('giphy.feeling' )}}</p>
      <div class="form-input form-input--left-extension">
        <input @input="doSearch" :placeholder="$t('giphy.search')">
        <i class="fas fa-search"></i>
      </div>
      <p v-show='items.length > 0'>{{ $t('giphy.select') }} {{ selectedImage || $t("giphy.noselect") }}</p>
      <!-- 
      <form @submit.prevent='handleSubmit'>
        <button :disabled="!selectedId" class='form-button choose-gif__btn'>{{ $t('giphy.post') }}</button>
      </form>
      -->
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
      selectedImage: ''
    }
  },
  methods: {
    doSearch: _.debounce(function(e) {
      axios.get(`/api/giphy/${e.target.value}`).then((resp) => this.items = resp.data);
    }, 300),
    handleImageSelected({title, id}) {
      this.selectedImage = title;
      this.$emit('change', id);
    },
    /*
    handleSubmit() {
      if(this.selectedId !== '') {
        axios.post('/api/post/create', {giphy_id: this.selectedId}).then(resp => location.reload());
      }
    }*/
  }
}
</script>
