<template>
    <div>
        <p>アイウエオ</p>
        {{ product.name }}
        {{ product.content }}
        Id::{{ product.id }}
    </div>
</template>

<script>
  export default {
    props: {
     product: Array,
    }
  }
</script>