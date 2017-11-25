import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Groups from '@/components/Groups'

Vue.use(Router)

export default new Router({
  mode: 'history',
  linkExactActiveClass: 'active',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/groups',
      name: 'Groups',
      component: Groups
    }
  ]
})
