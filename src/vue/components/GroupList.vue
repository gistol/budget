<template lang="pug">
  table.table.table-striped(width="100%")
    thead
      th Id
      th Title
      th.text-right Actions
    tbody
      tr(v-for="item in value")
        td {{item.id}}
        td {{item.title}}
        td.text-right
          button.btn.btn-sm.btn-default Edit
</template>

<script>

  export default {
    props: ['value']
  }
</script>
