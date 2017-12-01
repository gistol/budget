import Vue from 'vue'

const BASEURL = 'groups'

export default class GroupService {
  static getList () {
    return Vue.http.get(BASEURL)
      .then(response => response.body)
  }

  static add (data) {
    return Vue.http.post(BASEURL, data)
      .then(response => response.body)
  }

  static edit (id, title) {
    return Vue.http.patch(`${BASEURL}/${id}`, {
      title
    })
      .then(response => response.body)
  }

  static delete (id) {
    return Vue.http.delete(`${BASEURL}/${id}`)
  }
}
