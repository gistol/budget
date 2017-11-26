<template lang="pug">
  div
    h3 Add group
    new-group(@input="added")

    h3 Groups
    group-list(:value="list" @input="edited" @del="deleted")
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
      },

      edited: function (value) {
        GroupService.edit(value.id, value.title)
          .then(item => {
            const foundIndex = this.list.findIndex(x => x.id === item.id)
            this.list.splice(foundIndex, 1, item)
          })
      },

      deleted: function (id) {
        GroupService.delete(id)
          .then(() => {
            const foundIndex = this.list.findIndex(x => x.id === id)
            this.list.splice(foundIndex, 1)
          })
      }
    }
  }
</script>
