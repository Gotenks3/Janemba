<template>
  <div>
    <button
      class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4"
      @click="like(product.id)">
      <i class="fas fa-heart" :class="{ 'red-text': this.isLikedBy }"></i>
    </button>
  </div>
</template>

<script>
export default {

  props: {
    product: {
      type: Object,
    },
    initialIsLikedBy: {
      type: Boolean,
      default: false,
    },
    initialCountLikes: {
      type: Number,
      default: 0,
    },
  },
  data() {
    return {
      isLikedBy: this.initialIsLikedBy,
      countLikes: this.initialCountLikes,
    }
  },
  methods: {
    like(productId) {
      axios.post(`/like/${productId}`).then(({ data }) => {
        console.log(data);
      });
    },
  },
};
</script>

<style>
.red-text {
  color: red;
}
</style>