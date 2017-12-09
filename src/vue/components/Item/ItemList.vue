<template lang="pug">
  div
    div.row(v-for="item in value")
      .col-xs-2
        i.fa.fa-3x.fa-fw.text-muted(:class="'fa-' + item.group.icon" style="position:absolute")

      .col-xs-6
        b.text-success {{item.group.title}}

      .col-xs-4.text-right.price
        b.text-primary {{item.price}} ₽

      .col-xs-offset-2.col-xs-6
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
