<template lang="pug">
  form(@submit.prevent="submit")
    .form-group
      input.form-control(type="text" placeholder="Title" v-model="title" required)

    .text-right
      button.btn.btn-primary
        i.fa.fa-plus
        |
        | Add
</template>

<script>
  export default {
    props: ['value'],
    data () {
      return {
        title: ''
      }
    },
    methods: {
      submit: function () {
        this.$emit('input', this.title)
        this.title = ''
      }
    }
  }
</script>
