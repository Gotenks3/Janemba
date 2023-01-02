<template>
    <div>
        <button 
          class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4"
          @click="like(product.id)"
          >
            <i class="fas fa-heart"></i>
        </button>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        product: [], //postの情報がこの変数に入っている前提 post.idで使っているので。
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