<template lang="pug">
  modal(v-model="isOpen" size="sm" :header="false" @hide="onHide")
    p {{ text }}
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
      onHide: function (value) {
        if (value === 'ok') {
          this.$emit('confirmed', _value)
        }
      }
    }
  }
</script>
