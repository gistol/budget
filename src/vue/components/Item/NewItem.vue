<template lang="pug">
  form(@submit.prevent="submit")
    .form-group
      .input-group
        input.form-control(type="number" placeholder="Price" v-model="data.price" required)
        span.input-group-addon ₽

    .form-group
      select.form-control(v-model="data.group" required)
        option(disabled selected value="") - Group -
        option(v-for="group in groups" :value="group.id") {{group.title}}

    .form-group
      input.form-control(type="text" placeholder="Description" v-model="data.description")

    .form-group
      input.form-control(type="date" placeholder="Date" v-model="data.date")

    .text-right
      button.btn.btn-primary Add
</template>

<script>
  import GroupService from '@/services/GroupService'
  import * as moment from 'moment/moment'

  const DEFAULT_DATA = {
    price: '',
    description: '',
    group: '',
    date: ''
  }

  export default {
    data () {
      let date = moment().format('Y-MM-DD')

      return {
        data: Object.assign({}, DEFAULT_DATA, {
          date
        }),
        groups: [],
        submitting: false
      }
    },

    created: function () {
      GroupService.getList()
        .then(response => {
          this.groups = response.sort((a, b) => a.title.localeCompare(b.title))
        })
    },

    methods: {
      submit: function () {
        this.$emit('input', this.data)
      },

      clear: function () {
        const prevDate = this.data.date

        this.data = Object.assign({}, DEFAULT_DATA, {
          date: prevDate
        })
      }
    }
  }
</script>
