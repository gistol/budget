import Vue from 'vue'

const BASEURL = 'items'

export default class ItemService {
  static getList () {
    return Vue.http.get(BASEURL)
      .then(response => response.body)
  }

  static add (data) {
    return Vue.http.post(BASEURL, data)
      .then(response => response.body)
  }
}
