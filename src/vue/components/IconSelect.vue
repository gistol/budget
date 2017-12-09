<template lang="pug">
  modal(title="Select icon" :footer="false" v-model="opened")
    .icon-list
      a.text-primary(v-for="icon in list" @click.prevent="select(icon)" href="")
        i.fa.fa-3x.fa-fw(:class="'fa-'+icon")
</template>

<script>
  import faList from '../utils/fa-list'
  import { Modal } from 'uiv'

  export default {
    props: ['value'],

    data () {
      return {
        opened: false,
        list: faList
      }
    },

    components: {
      modal: Modal
    },

    methods: {
      open: function () {
        this.opened = true
      },

      select: function (icon) {
        this.opened = false
        this.$emit('input', icon)
      }
    }
  }
</script>

<style>
  .icon-list > a {
    display: inline-block;
    margin: 5px;
  }
</style>
