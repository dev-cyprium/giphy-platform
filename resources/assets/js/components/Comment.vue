<template>
  <form>
    <div class="post-comment-form__count-wrap">
      <input 
      @focus="visible = true" 
      @blur="visible = false"
      @input="handleKeyUp"
      :class="[
      {'post-comment-form__input--danger': (char_left < 0)},
      'post-comment-form__input'
      ]" 
      type="text" 
      :placeholder="$t('comments.new')">
      <span v-show="visible" :class="[
        {'post-comment-form__number--danger': (char_left < 10)},
        'post-comment-form__number'
      ]">
        {{ char_left }}
      </span>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      char_left: 50,
      visible: false
    }
  },
  methods: {
    handleKeyUp(ev) {
      let charsInInput = ev.target.value.length;
      this.char_left = 50 - charsInInput;
    }
  }
}
</script>
