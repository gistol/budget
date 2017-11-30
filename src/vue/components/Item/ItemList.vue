<template lang="pug">
  div
    div.row(v-for="item in value")
      .col-xs-8
        b.text-success {{item.group.title}}

      .col-xs-4.text-right.price
        b.text-primary {{item.price}} ₽

      .col-xs-8
        .text-muted.crop
          b(v-if="item.description") {{item.description}}
          i(v-else) - no description -

      .col-xs-4.text-right
          p.text-muted {{item.date}}

      .col-xs-12
        hr
</template>

<script>
  export default {
    props: ['value']
  }
</script>

<style lang="less" scoped>
  .price {
    font-size: 150%;
  }

  .crop {
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  hr {
    margin: 0 0 4px;
  }
</style>
