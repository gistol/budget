<template lang="pug">
  table.table.table-striped.table-condensed(width="100%")
    thead
      tr
        th Icon
        th Title
        th.text-right Actions
    tbody
      tr(v-for="item in list")
        td
          a(@click.prevent="changeIcon(item.id)" href="")
            i.fa.fa-2x(:class="item.icon ? 'fa-'+item.icon : 'fa-list'")

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

    icon-select(ref="icon" @input="selectIcon")
</template>

<script>
  import { Modal } from 'uiv'
  import Confirm from '../Confirm'
  import IconSelect from '../IconSelect'

  let currentId = null

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
      confirm: Confirm,
      'icon-select': IconSelect
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
      },
      changeIcon: function (id) {
        currentId = id
        this.$refs.icon.open()
      },
      selectIcon: function (icon) {
        this.$emit('input', {
          id: currentId,
          icon: icon
        })
      }
    }
  }
</script>
