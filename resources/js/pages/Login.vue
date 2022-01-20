<template>
    <div class="container">
        <!-- Gerer le formulaire d'inscription -->
        <h3>Connexion</h3>
        <div>{{ error }}</div>
        <form method="POST" @submit.prevent="login">
            <fieldset>
                <div>
                    <label for="email">Email :</label>
                    <input type="email" v-model="email" id="email">
                </div>
                <div>
                    <label for="">Mot de passe :</label>
                    <input type="password" v-model="pass" id="pass">
                </div>
            </fieldset>
            <button>Se connecter</button>
        </form>
    </div>
</template>

<script>
import Router from 'vue-router';

export default {
    name : "login",
    data() {
      return {
        email: '',
        pass: '',
        rememberMe: false,
        has_error: false,
        error: ""
      }
    },

    methods: {
        login() {
            this.$store
                .dispatch('login', {
                    email: this.email,
                    password: this.pass
                })
                .then(() => {
                    this.$router.push({name: 'dashboard'})
                })
                .catch(err => {
                    console.log(err)
                    this.error = err;
                })
        }
    }
}
</script>