import Vue from 'vue'
import * as moment from 'moment/moment'

const BASEURL = 'items'
const FORMAT = 'DD.MM.Y'

export default class ItemService {
  static getList () {
    return Vue.http.get(BASEURL)
      .then(response => response.body)
      .then(response => response.map(item => {
        item.date = moment(item.date).format(FORMAT)

        return item
      }))
  }

  static add (data) {
    return Vue.http.post(BASEURL, data)
      .then(response => response.body)
  }
}
