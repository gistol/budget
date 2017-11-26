<template lang="pug">
  table.table.table-striped(width="100%")
    thead
      th Title
      th.text-right Actions
    tbody
      tr(v-for="item in value")
        td {{item.title}}
        td.text-right
          .btn-group
            button.btn.btn-sm.btn-default(@click="modal(item)")
              i.fa.fa-lg.fa-pencil

            button.btn.btn-sm.btn-danger(@click="del(item)")
              i.fa.fa-lg.fa-times

    modal(v-model="showModal" title="Edit group" @hide="onHide")
      .form-group
        input.form-control(type="text" placeholder="Title" v-model="modalData.title" required)
</template>

<script>
  import { Modal } from 'uiv'

  export default {
    props: ['value'],
    data () {
      return {
        showModal: false,
        modalData: {}
      }
    },
    components: {
      modal: Modal
    },
    methods: {
      modal: function (item) {
        this.modalData = Object.assign({}, item)
        this.showModal = true
      },
      onHide: function (value) {
        if (value === 'ok') {
          this.$emit('input', this.modalData)
        }
      },
      del: function (value) {
        this.$emit('del', value.id)
      }
    }
  }
</script>
