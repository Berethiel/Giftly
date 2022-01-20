import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
      user: null,
      wishlist: null
    },
  
    mutations: {
      setUserData (state, userData) {
        state.user = userData
        localStorage.setItem('user', JSON.stringify(userData))
        axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
      },
      clearUserData () {
        localStorage.removeItem('user')
        location.reload()
      },
      getUserWishlist(state, response) {
        state.wishlist = response.wishlist;
    }
      //AJOUTER ICI LE CHARGEMENT DES WISHLISTS
      //L APPELER DANS LE THEN LORS DE L AJOUT D UN ITEM
    },
  
    actions: {
      //USER
      login ({ commit }, credentials) {
        return axios
          .post('/api/auth/login', credentials)
          .then(({ data }) => {
            commit('setUserData', data)
          })
      },
      register ({ commit }, credentials) {
        return axios
          .post('/api/auth/register', credentials)
          .then(({ data }) => {
            return data;
          })
      },
      logout ({ commit }) {
        commit('clearUserData')
      },
      //WISHLIST
      showWishlist ({ commit }, data) {
        return axios
          .post('/api/wishlist/show', data)
          .then(({ data }) => {
            //commit('getUserWishlist', data)
            return data;
          })
      },
      createWishlist ({ commit }, data) {
        return axios
          .post('/api/wishlist/create', data)
          .then(({ data }) => {
            return data
          })
      },
      suppressWishlist ({ commit }, data) {
        return axios
          .post('/api/wishlist/delete', data)
          .then(({ data }) => {
            return data
          })
      },
      updateWishlist ({ commit }, data) {
        return axios
          .post('/api/wishlist/update', data)
          .then(({ data }) => {
            return data
          })
      },
      //ITEM
      createItem ({ commit }, data) {
        return axios
          .post('/api/item/create', data)
          .then(({ data }) => {
            return data
          })
      },
      suppressItem ({ commit }, data) {
        return axios
          .post('/api/item/delete', data)
          .then(({ data }) => {
            return data
          })
      },
      updateItem ({ commit }, data) {
        return axios
          .post('/api/item/update', data)
          .then(({ data }) => {
            return data
          })
      },
    },
  
    getters : {
      isLogged: state => !!state.user
    }
  })