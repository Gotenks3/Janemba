<template>
    <div>
        <button 
            @click="like(product.id)">
            いいね
        </button>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        product: {}, //postの情報がこの変数に入っている前提 post.idで使っているので。
      };
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