<template>
    <div class="container-sm">
        <form @submit.prevent="dispatch" method="POST">
            <fieldset>
                <div>
                    <label for="imgItem">Image (lien) :</label>
                    <input type="url" v-model="imgItem" id="imgItem">
                </div>
                <div>
                    <label for="nameItem">Nom :</label>
                    <input type="text" v-model="nameItem" id="nameItem"  size="50" required="required">
                </div>
                <div>
                    <label for="adressWeb">Adresse web :</label>
                    <input type="url" v-model="adressWeb" id="adressWeb">
                </div>
                <div>
                    <label for="shopName">Nom boutique :</label>
                    <input type="text" v-model="shopName" id="shopName" size="50" required="required">
                </div>
                <button type="register" v-if="type !== 'update'">Ajouter</button>
                <button type="register" v-if="type === 'update'">Modifier</button>
            </fieldset>
        </form>
    </div>
</template>

<script>

    export default {
        components: {
        },
        props: {
            idWishlist: null,
            type: null,
            item: null
        },
        data() {
        return {
              imgItem: "",
              nameItem: "",
              adressWeb: "",
              shopName: ""
          }
        },
    created() {
        this.loadInfo();
    },
        methods: {
            loadInfo() {
                if(this.type === 'update') {
                    this.imgItem = this.item.img_item;
                    this.nameItem = this.item.name_item;
                    this.adressWeb = this.item.adress_web;
                    this.shopName = this.item.shop_name;
                    console.log(this.item);
                }
            },
            dispatch() {
                if(this.type !== 'update') {
                    this.create();
                } else if(this.type === 'update') {
                    console.log('call update');
                    this.update();
                }
            },
            update() {
                console.log('in update')
                this.$store.dispatch('updateItem', {
                    id: this.item.id,
                    imgItem: this.imgItem,
                    nameItem: this.nameItem,
                    adressWeb: this.adressWeb,
                    shopName: this.shopName,
                    idWishlist: this.idWishlist
                }).then(() => {
                    console.log('update item');
                    this.$emit('reload-wishlist');
                });
            },
            create() {
                this.$store.dispatch('createItem', {
                    imgItem: this.imgItem,
                    nameItem: this.nameItem,
                    adressWeb: this.adressWeb,
                    shopName: this.shopName,
                    idWishlist: this.idWishlist
                }).then(() => {
                    this.$emit('reload-wishlist');
                    console.log('create item');
                });
            }
        }
    }
</script>
