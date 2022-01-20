<template>
    <div class="container-sm">
        <article>
            <header class="wlHeader">
                <h1 v-if="modifyWishlist === false">{{ wishlist.name_list }}</h1>
                <input v-if="modifyWishlist === true" type="text" v-model="nameList" id="nameList" size="25" required="required">
                <button v-if="modifyWishlist === true" @click.prevent="update">Modifier</button>
                <div>
                    <a v-if="modifyWishlist === false" class="addWishlist" @click.prevent="suppress"><i class="fas fa-times-circle" ></i></a>
                    <a class="addWishlist" @click.prevent="modify"><i class="fas fa-edit"></i></a>
                </div>
                
            </header>
            <item 
                v-for="el in wishlist.items" 
                :key="el.id"
                :item="el"
                :idWishlist="wishlist.id"
                @reload-wishlist="reloadWishlist()"
            ></item>
            <a class="addItem" @click.prevent="openModal" v-if="newItem === false"><i class="fas fa-plus-circle"></i></a>
            <a class="addItem" @click.prevent="openModal" v-if="newItem === true"><i class="fas fa-minus-circle"></i></a>
            <new-item-form 
                :idWishlist="wishlist.id" 
                @reload-wishlist="reloadWishlist()" 
                v-if="newItem === true"
            ></new-item-form>
        </article>
    </div>
</template>

<script>
import Item from './Item.vue';
import NewItemForm from './NewItemForm.vue';

    export default {
        components: {
            Item,
            NewItemForm
        },
        props: {
          wishlist: null
        },
        data() {
        return {
              newItem: false,
              modifyWishlist: false,
              nameList: ""
          }
        },
        methods: {
            openModal() {
                if(this.newItem === false) {
                    this.newItem = true;
                } else if(this.newItem === true) {
                    this.newItem = false;
                }
            },
            suppress() {
                this.$store.dispatch('suppressWishlist', {id: this.wishlist.id}).then((data) => {
                    if(!('error' in data)) {
                        this.$emit('reload-wishlist');
                    }
                });
            },
            modify() {
                if(this.modifyWishlist === false) {
                    this.modifyWishlist = true;
                    this.nameList = this.wishlist.name_list;
                } else if(this.modifyWishlist === true) {
                    this.modifyWishlist = false;
                }
            },
            update() {
                this.$store.dispatch('updateWishlist', {id: this.wishlist.id, nameList: this.nameList}).then((data) => {
                    this.modifyWishlist = false;
                    if(!('error' in data)) {
                        this.$emit('reload-wishlist');
                    }
                });
            },
            reloadWishlist() {
                this.$emit('reload-wishlist');
                this.newItem = false;
            }
        }
    }
</script>
