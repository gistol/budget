import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Item/Home'
import Groups from '@/components/Group/Groups'

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
