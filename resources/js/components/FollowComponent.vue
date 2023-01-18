<template>
  <div>
  
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
      <i class="fas fa-check">
      </i>
      フォローする
    </button>
    {{ this.isFollowedBy }}
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
  },
  data() {
    return {
      isFollowedBy: this.initialIsFollowedBy
    }
  },
  // methods: {
  // }
};
</script>

<style>

</style>