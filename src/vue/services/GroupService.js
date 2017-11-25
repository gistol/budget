import Vue from 'vue'

export default class GroupService {
  static getList () {
    return Vue.http.get('types')
      .then(response => response.body)
  }

  static add (title) {
    return Vue.http.post('types', {
      title
    })
      .then(response => response.body)
  }
}
