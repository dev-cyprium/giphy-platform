<template>
  <form @submit.prevent="handleFormSubmit">
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
        v-model="comment"
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
import axios from 'axios';

export default {
  props: ['post-id'],
  data() {
    return {
      char_left: 50,
      visible: false,
      comment: ''
    }
  },
  methods: {
    handleKeyUp(ev) {
      let charsInInput = ev.target.value.length;
      this.char_left = 50 - charsInInput;
      if(this.char_left < -99) {
        this.char_left = -99;
      }
    },
    handleFormSubmit() {
      // http://localhost:8000/api/post/2/comment/create
      axios.post(`/api/post/${this.postId}/comment/create`, {
        text: this.comment
      });
      this.comment = '';
      this.char_left = 50;
    }
  }
}
</script>
