<template lang="pug">
  div
    h3 Home
    new-item(ref="form" @input="added")

    h3 List
    item-list(:value="list")
</template>

<script>
  import NewItem from './NewItem'
  import ItemList from './ItemList'
  import ItemService from '@/services/ItemService'

  export default {
    data () {
      return {
        list: []
      }
    },

    components: {
      'new-item': NewItem,
      'item-list': ItemList
    },

    created: function () {
      ItemService.getList()
        .then(response => {
          this.list = response
        })
    },

    methods: {
      added: function (data) {
        ItemService.add(data)
          .then(item => {
            this.list.unshift(item)
            this.$refs.form.clear()
          })
      }
    }
  }
</script>
