<template>
    <body>
        <header>
            <div class="logoConnect" id="up">
                <router-link :to="{ name: 'home' }" v-if="!isLogged"><img src="img/logo_test.png" alt="Le logo du site, pour le moment un simple cadeau rouge de trois quart" class="logo"></router-link>
                <router-link :to="{ name: 'dashboard' }" v-if="isLogged"><img src="img/logo_test.png" alt="Le logo du site, pour le moment un simple cadeau rouge de trois quart" class="logo"></router-link>
                <div class="connect">
                    <!-- A afficher uniquement si aucun user n'est connecté -->
                    <nav>
                        <ul>
                            <li><router-link :to="{ name: 'login' }" v-if="!isLogged">Se connecter</router-link></li>
                            <li><router-link :to="{ name: 'register' }" v-if="!isLogged">S'inscrire</router-link></li>
                        </ul>
                    </nav>
                    <!-- A afficher uniquement s'il y a un user de connecté -->
                    <nav>
                        <input type="text" v-if="isLogged">
                    </nav>
                    <nav>
                        <ul>
                            <li><router-link :to="{ name: 'userParams' }" v-if="isLogged">Compte</router-link></li>
                            <li @click="logout" v-if="isLogged" class="deco">Se déconnecter</li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- A afficher uniquement si aucun user n'est connecté -->
            <nav>
                <ul>
                    <li><router-link :to="{ name: 'home' }" v-if="!isLogged">Home</router-link></li>
                    <li><router-link :to="{ name: 'about' }" v-if="!isLogged">About</router-link></li>
                    <!--<li><router-link :to="{ name: 'contact' }" v-if="!isLogged">Contact</router-link></li>-->
                </ul>
            </nav>
            
        </header>

        <router-view></router-view>

        <footer>
            <aside>
                <router-link :to="{ name: 'about' }" v-if="!isLogged">About</router-link>
                <a href="#up">Haut</a>
            </aside>
            <aside>
                <small>Ce site a été fait dans le cadre d'un projet de fin d'alternance</small>
            </aside>
        </footer>
    </body>
</template>

<style>
    /* le style */
    .container {
        max-width: 960px;
        margin: 0 auto; padding: 40px;
        text-align: center;
        font-family: calibri, arial;
    }
</style>

<script>
    import { mapGetters } from 'vuex'
    export default {
        name : "layout",
        data () {
            return {
            }
        },
        computed: {
            ...mapGetters([
                'isLogged'
            ])
        },
        methods : {
            logout() {
                this.$store.dispatch('logout')
            }
        }
    }
</script>