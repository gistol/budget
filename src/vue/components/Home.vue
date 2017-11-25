<template lang="pug">
  div
    h3 Home
    new-item
</template>

<script>
  import NewItem from './NewItem'

  export default {
    components: {
      'new-item': NewItem
    }
  }
</script>
