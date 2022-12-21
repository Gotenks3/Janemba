<template>
    <v-app>
      <v-btn @click="my_dialog = true">開く</v-btn>
      <v-dialog v-model="my_dialog" max-width="400">
        <v-card>
          <v-card-title>
            <div>タイトル</div>
          </v-card-title>
          <v-card-text>
            <p>本文</p>
          </v-card-text>
  
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="my_dialog = false">閉じる</v-btn>
            <v-btn @click="confirm">確認</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-app>
  </template>
  <script>
  export default {
    data() {
      return {
        my_dialog: false,
      }
    },
    methods: {
      confirm() {
        alert('確認しました')
        this.my_dialog = false
      },
    },
  }
  </script>