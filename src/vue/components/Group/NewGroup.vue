<template lang="pug">
  form(@submit.prevent="submit")
    .form-group
      input.form-control(type="text" placeholder="Title" v-model="data.title" required)

    .form-group
      p.form-control-static
        a(@click.prevent="$refs.iconModal.open()" href)
          i.fa.fa-2x(:class="'fa-' + data.icon")
        |
        | Icon

    .text-right
      button.btn.btn-primary
        i.fa.fa-plus
        |
        | Add

    icon-select(ref="iconModal" @input="(icon) => data.icon = icon")
</template>

<script>
  import IconSelect from '../IconSelect'

  const DEFAULT_DATA = {
    title: '',
    icon: 'list'
  }

  export default {
    props: ['value'],
    data () {
      return {
        data: Object.assign({}, DEFAULT_DATA)
      }
    },

    components: {
      'icon-select': IconSelect
    },

    methods: {
      submit: function () {
        this.$emit('input', this.data)
        this.data = Object.assign({}, DEFAULT_DATA)
      }
    }
  }
</script>
