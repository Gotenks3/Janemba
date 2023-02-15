<template>
  <div>
    <div v-if="!isFollowedBy">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded"
        @click="follow">
        <i class="fas fa-check">
        </i>
        フォローする
      </button>
    </div>
    <div v-else="isFollowedBy">
      <button class="bg-blue-300 hover:bg-blue-500 text-white font-bold py-2 px-4 border border-blue-500 rounded"
        @click="unfollow">
        <i class="fas fa-check">
        </i>
        フォロー中
      </button>
    </div>

  </div>
</template>

<script>
import axios from 'axios';

export default {

  props: {
    initialIsFollowedBy: {
      type: Boolean,
      default: false,
    },
    initialCountFollowers: {
      type: Number,
      default: 0,
    },
    endpoint: {
      type: String,
    },
  },
  data() {
    return {
      isFollowedBy: this.initialIsFollowedBy,
      countFollowers: this.initialCountFollowers,
    }
  },
  methods: {
    async follow() {

      const response = await axios.put(this.endpoint)

      console.log(1)
      this.isFollowedBy = true
      this.countFollowers = response.data.countFollowers
    },
    async unfollow() {

      const response = await axios.delete(this.endpoint)

      console.log(2)
      this.isFollowedBy = false
      this.countFollowers = response.data.countFollowers
    },
  }
};
</script>

<style>

</style>