<template lang="pug">
  table.table.table-striped.table-condensed(width="100%")
    thead
      tr
        th Title
        th.text-right Actions
    tbody
      tr(v-for="item in list")
        td {{item.title}}
        td.text-right
          .btn-group
            button.btn.btn-default(@click="modal(item)")
              i.fa.fa-lg.fa-pencil

            button.btn.btn-danger(@click="$refs.confirm.open('Remove '+item.title+'?', item)")
              i.fa.fa-lg.fa-times

    modal(v-model="showModal" title="Edit group" @hide="onHide" auto-focus)
      .form-group
        input.form-control(type="text" placeholder="Title" v-model="modalData.title" data-action="auto-focus" required)

    confirm(ref="confirm" @confirmed="del")
</template>

<script>
  import { Modal } from 'uiv'
  import Confirm from '../Confirm'

  export default {
    props: ['value'],
    data () {
      return {
        showModal: false,
        modalData: {}
      }
    },
    components: {
      modal: Modal,
      confirm: Confirm
    },
    computed: {
      list: function () {
        return this.value.sort((a, b) => a.title.localeCompare(b.title))
      }
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
