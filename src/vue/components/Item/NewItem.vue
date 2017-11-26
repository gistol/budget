<template lang="pug">
  form(@submit.prevent="submit")
    .form-group
      .input-group
        input.form-control(type="number" placeholder="Price" v-model="data.sum" required)
        span.input-group-addon ₽

    .form-group
      select.form-control(v-model="data.group" required)
        option(disabled selected value="") - Group -
        option(v-for="(text, id) in groups" v-bind:value="id") {{text}}

    .form-group
      input.form-control(type="text" placeholder="Description" v-model="data.descr")

    .text-right
      button.btn.btn-primary(:disabled="submitting") Add
</template>

<script>
  const DEFAULT_DATA = {
    sum: '',
    descr: '',
    group: ''
  }

  export default {
    data () {
      return {
        data: Object.assign({}, DEFAULT_DATA),
        groups: {
          '1': 'First',
          '2': 'Second'
        },
        submitting: false
      }
    },
    methods: {
      submit: function () {
        this.submitting = true
        setTimeout(() => {
          this.data = Object.assign({}, DEFAULT_DATA)
          this.submitting = false
        }, 1000)
      }
    }
  }
</script>
