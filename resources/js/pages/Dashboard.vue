<template>
    <div class="container-sm">
        <user-card :user="user"></user-card>
        <div>
            <input class="newWishlist" type="text" size="25" required="required" v-model="nameList" placeholder="AJouter une nouvelle liste...">
            <i @click="createWishlist()" class="fas fa-plus-circle"></i>
        </div>
        
        <wishlist v-for="wl in wishlist" :wishlist="wl" @reload-wishlist="reloadWishlist()" :key="wl.id"></wishlist>
    </div>
</template>

<script>
import Wishlist from '../components/Wishlist.vue';
import UserCard from '../components/UserCard.vue';
import axios from 'axios';

export default {
    components: {
        Wishlist,
        UserCard
    },
    name : "dashboard",
    data() {
      return {
          user: null,
          nameList: "",
          wishlist: null
      }
    },
    created() {
        this.getUserInfo();
        this.getUserWishlist();
    },
    
    methods: {
        getUserInfo() {
            this.user = this.$store.state.user.user;
        },
        getUserWishlist() {
            this.$store.dispatch('showWishlist', {userId: this.user.id})
                .then((data) => {
                    this.wishlist = data.wishlist;
                });
        },
        createWishlist() {
            console.log(this.user.id);
            this.$store.dispatch('createWishlist', {nameList: this.nameList, userId: this.user.id})
                .then(() => {
                    this.getUserWishlist();
                    this.nameList = "";
                });
        },
        reloadWishlist() {
            console.log('recieved for update');
            this.getUserWishlist();
        }
    }
}
</script>