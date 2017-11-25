<template lang="pug">
  div
    h3 Groups
    new-group(@input="added")
    group-list(:value="list")
</template>

<script>
  import NewGroup from './NewGroup'
  import GroupList from './GroupList'
  import GroupService from '@/services/GroupService'

  export default {
    data () {
      return {
        list: []
      }
    },
    components: {
      GroupList,
      'new-group': NewGroup,
      'group-list': GroupList
    },
    created: function () {
      GroupService.getList()
        .then(response => {
          this.list = response
        })
    },

    methods: {
      added: function (value) {
        GroupService.add(value)
          .then(item => {
            this.list.push(item)
          })
      }
    }
  }
</script>
