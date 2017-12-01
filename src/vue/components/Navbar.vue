<template>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" @click="showNavbar=!showNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <router-link class="navbar-brand" to="/">
          <i class="fa fa-dollar fa-lg"></i>
        </router-link>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <collapse class="navbar-collapse" v-model="showNavbar">
        <ul class="nav navbar-nav">
          <router-link to="/" tag="li"><a>Home</a></router-link>
          <router-link to="/groups" tag="li"><a>Groups</a></router-link>
        </ul>
      </collapse><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</template>

<script>
  import { Collapse } from 'uiv'

  export default {
    data () {
      return {
        showNavbar: false
      }
    },
    components: {
      collapse: Collapse
    }
  }
</script>

<style>
  .navbar {
    border-radius: 0
  }
</style>
