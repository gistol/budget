<template lang="pug">
  div
    navbar
    .container
      #app
        router-view

    vue-progress-bar
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
    @import "~font-awesome/less/font-awesome.less";
    @import "~bootstrap/less/bootstrap.less";
    @import "~bootswatch/lumen/variables.less";
    @import "~bootswatch/lumen/bootswatch.less";
</style>
