<template lang="pug">
  div
    h3 Home
    new-item(@input="added")
</template>

<script>
  import NewItem from './NewItem'
  import ItemService from '@/services/ItemService'

  export default {
    components: {
      'new-item': NewItem
    },

    methods: {
      added (data) {
        ItemService.add(data)
      }
    }
  }
</script>
