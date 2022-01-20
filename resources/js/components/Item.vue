<template>
    <div>
        <ul class="item">
            <li v-if="updateItem === false">
                <img :src="item.img_item" :alt="item.name_item">
                <div class="infoWishlist">
                    <p>{{ item.name_item }}</p>
                    <div>
                        <p>{{ item.shop_name }}</p>
                        <a class="linkWishlist" :href="item.adress_web" target="_blank" rel="noopener noreferrer"><i class="fas fa-external-link-alt"></i></a>
                        <p></p>
                        <p></p>
                    </div>
                </div>
                <div>
                    <a class="addItem" @click.prevent="suppress"><i class="fas fa-times-circle" ></i></a>
                    <a class="addItem" @click.prevent="openModal"><i class="fas fa-edit"></i></a>
                </div>
            </li>
            <li v-if="updateItem === true">
                <new-item-form :idWishlist="idWishlist" @reload-wishlist="reloadWishlist()"  :item="item" :type="'update'"></new-item-form>
            </li>
            <li>
                
            </li>
        </ul>
        <hr>
    </div>
</template>

<script>
import NewItemForm from './NewItemForm.vue';

    export default {
        components: {
            NewItemForm
        },
        props: {
          item: null,
          idWishlist: null
        },
        data() {
            return {
                updateItem: false
            }
        },
        methods: {
            suppress() {
                this.$store.dispatch('suppressItem', {id: this.item.id});
                this.$emit('reload-wishlist');
                console.log('delete item');
            },
            openModal() {
                console.log('open modal');
                if(this.updateItem === false) {
                    this.updateItem = true;
                } else if(this.updateItem === true) {
                    this.updateItem = false;
                }
            },
            reloadWishlist() {
                console.log('emit for update');
                this.$emit('reload-wishlist');
                this.updateItem = false;
            }
        }
    }
</script>
