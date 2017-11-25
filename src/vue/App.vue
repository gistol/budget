<template lang="pug">
  .container
    #app
      router-view
</template>

<script>
export default {
  name: 'app'
}
</script>

<style lang="less">
    @import "~bootstrap/less/bootstrap.less";
    @import "~bootswatch/flatly/variables.less";
    @import "~bootswatch/flatly/bootswatch.less";
</style>
