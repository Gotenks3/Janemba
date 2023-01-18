<template>
  <div>
    <button
      class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
      <i class="fas fa-heart" 
        :class="{'red-text':this.isLikedBy, 'animated heartBeat fast':this.gotToLike}"
        @click="clickLike"
        >
      </i>
    </button>
  {{ this.countLikes }}
    

  </div>
</template>

<script>
import axios from 'axios';

export default {

  props: {
    initialIsLikedBy: {
        type: Boolean,
        default: false,
    },
    initialCountLikes: {
      type: Number,
      default: 0,
    },
    endpoint: {
      type: String,
    },
  },
  data() {
    return {
      isLikedBy: this.initialIsLikedBy,
      countLikes: this.initialCountLikes,
      gotToLike: false, 
    }
  },
  methods: {
      clickLike() {
        this.isLikedBy
          ? this.unlike()
          : this.like()
      },
      async like() {
        const response = await axios.put(this.endpoint)

        console.log(1)
        this.isLikedBy = true
        this.countLikes = response.data.countLikes
        this.gotToLike = true 
      },
      async unlike() {
        const response = await axios.delete(this.endpoint)
        console.log(2)

        this.isLikedBy = false
        this.countLikes = response.data.countLikes
        this.gotToLike = false
      },
    },
};
</script>

<style>
.red-text {
  color: red;
}
</style>