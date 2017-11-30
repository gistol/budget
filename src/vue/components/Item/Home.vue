<template lang="pug">
  div
    h3 Home
    new-item(@input="added")

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
      added (data) {
        ItemService.add(data)
      }
    }
  }
</script>
