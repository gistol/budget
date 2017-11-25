<template lang="pug">
  div
    navbar
    .container
      #app
        router-view
</template>

<script>
import Navbar from './components/Navbar'

export default {
  name: 'app',
  components: {
    navbar: Navbar
  }
}
</script>

<style lang="less">
    @import "~bootstrap/less/bootstrap.less";
    @import "~bootswatch/flatly/variables.less";
    @import "~bootswatch/flatly/bootswatch.less";
</style>
