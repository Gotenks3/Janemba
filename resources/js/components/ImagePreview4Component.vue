<template>
    <div id="app">
        <input 
            type="file" 
            ref="preview" 
            name="image4" 
            accept=“image/png,image/jpeg,image/jpg”
            @change="uploadFile">
        <div v-if="url">
            <img :src="url">
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            url: ""
        }
    },
    methods: {
        uploadFile() {
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file)
        }
    }
}
</script>
