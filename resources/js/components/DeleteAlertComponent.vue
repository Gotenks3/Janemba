<template>
  <v-app>
    <div class="text-center">
      <v-dialog v-model="dialog" width="500">
        <template v-slot:activator="{ on, attrs }">
          <v-btn color="red lighten-2" dark v-bind="attrs" v-on="on">
            削除
          </v-btn>
        </template>

        <v-card>
          <v-card-title class="text-h5 red lighten-2">
            確認画面
          </v-card-title>

          <v-card-text>
            本当に削除してよろしいですか？
          </v-card-text>

          <v-divider></v-divider>

          <v-card-actions>
            <v-spacer>記事id: {{ product.id }}</v-spacer>

            <v-btn color="gray" text @click="dialog = false">
              いいえ
            </v-btn>
            <v-btn color="primary" text @click="submit(product.id)">
              はい
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </div>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      dialog: false,
    }
  },
  props: {
    product: {
      type: Object,
    },
    endpoint: {
      type: String,
    },
  },
  methods: {
    submit(id) {
      const axios = require('axios');
      console.log(20000);
      axios.delete(`/product/${id}`).then(res => {
        console.log(10000);
        console.log(res.data);
        alert("記事を削除しました。");
      })
        .catch(err => console.log(err));

      // const headers = {
      //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //       }
      //  fetch(`http://127.0.0.1:8000/product/${id}`, {
      //   method: "delete",

      // })
      //   .then(res => res.json())
      //   .then(data => {
      //     alert("記事を削除しました。");
      //     this.fetchArticles();
      //   })
      //   .catch(err => console.log(err));
    }
  }
}
</script>