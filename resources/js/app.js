import Layout from './layouts/Layout.vue';
import axios from 'axios'
import './bootstrap'
import Vue from 'vue'
import router from './router'
import VueRouter from 'vue-router'
import store from '../store'

// Set Vue globally
window.Vue = Vue

// Set Vue router
Vue.router = router
Vue.use(VueRouter)

const app = new Vue({
  el: '#app',
  router,
  store,
  created () {
    const userInfo = localStorage.getItem('user')
    if (userInfo) {
      const userData = JSON.parse(userInfo)
      this.$store.commit('setUserData', userData)
    }
    axios.interceptors.response.use(
      response => response,
      error => {
        if (error.response.status === 401) {
          this.$store.dispatch('logout')
        }
        return Promise.reject(error)
      }
    )
  },  
  render: h => h(Layout)
});