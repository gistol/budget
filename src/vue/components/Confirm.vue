<template lang="pug">
  modal(v-model="isOpen" size="sm" :header="false" auto-focus)
    p {{ text }}
    div(slot="footer")
      button.btn.btn-default(@click="isOpen=false") Cancel
      button.btn.btn-danger(@click="confirm()" data-action="auto-focus") Ok
</template>

<script>
  import { Modal } from 'uiv'

  let _value = null

  export default {
    data () {
      return {
        isOpen: false,
        text: ''
      }
    },

    components: {
      modal: Modal
    },

    methods: {
      open: function (text, value) {
        _value = value
        this.text = text
        this.isOpen = true
      },
      confirm: function (value) {
        this.isOpen = false
        this.$emit('confirmed', _value)
      }
    }
  }
</script>
