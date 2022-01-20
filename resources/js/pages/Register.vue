<template>
    <div class="container">
        <!-- Gerer le formulaire d'inscription -->
        <h3>Inscription</h3>
        <p id="errorPass">{{ error }}</p>
        <small>* Champs obligatoires</small>
        <form @submit.prevent="register" method="POST">
            <fieldset>
                <legend>Informations de connection :</legend>
                <div>
                    <label for="email">Email* :</label>
                    <input type="email" v-model="email" id="email" required="required">
                </div>
                <div>
                    <label for="pass">Mot de passe* :</label>
                    <input type="password" v-model="pass" id="pass" required="required">
                </div>
                <div>
                    <label for="pass2">Confirmation* :</label>
                    <input type="password" v-model="pass2" id="pass2" @keyup="identicalPassword" required="required">
                </div>
            </fieldset>
            <fieldset>
                <legend>Adresse :</legend>
                <div>
                    <label for="firstName">Prénom :</label>
                    <input type="text" v-model="firstName" maxlength="50" id="firstName">
                </div>
                <div>
                    <label for="lastName">Nom :</label>
                    <input type="text" v-model="lastName" maxlength="50" id="lastName">
                </div>
                <div>
                    <label for="address">N° et nom de rue :</label>
                    <input type="text" v-model="address" maxlength="100" id="address">
                </div>
                <div>
                    <label for="zipcode">Code postal :</label>
                    <input type="text" pattern="[0-9]{5}" title="5 chiffres" v-model="zipcode" id="zipcode">
                </div>
                <div>
                    <label for="city">Ville :</label>
                    <input type="text" v-model="city" id="city">
                </div>
                <div>
                    <label for="country">Pays :</label>
                    <input type="text" v-model="country" id="country">
                </div>
                <div>
                    <label for="birth">Date de naissance* :</label>
                    <input type="date" v-model="birth" id="birth" required="required">
                </div>
            </fieldset>
            <button type="register">Valider</button>
       </form> 
    </div>
</template>

<script>
import Router from 'vue-router';

export default {
    name : "signUp",
    data() {
      return {
        email: '',
        pass: '',
        pass2: '',
        firstName: '',
        lastName: '',
        address: '',
        zipcode: '',
        city: '',
        country: '',
        birth: '',
        has_error: false,
        error: '',
        errors: {},
        success: false
      }
    },

    methods: {
        register() {
            if(this.pass === this.pass2) {
                this.$store
                    .dispatch('register', {
                        email: this.email,
                        password: this.pass,
                        firstName: this.firstName,
                        lastName: this.lastName,
                        address: this.address,
                        zipcode: this.zipcode,
                        city: this.city,
                        country: this.country,
                        birth: this.birth,
                    })
                    .then((response) => {
                        console.log(response)
                        if(response === "ok") {
                            this.$router.push({name: 'login'})
                        } else {
                            this.error = response.message;
                        }
                        
                    })
                    .catch(err => {
                        console.log(err)
                        this.error = err.message;
                    })
            } else {
                this.error = 'Les deux mots de passes ne sont pas identique...';
            }
        },
        identicalPassword() {
            if(this.pass !== this.pass2) {
                this.error = 'Les deux mots de passes ne sont pas identique...';
            } else if(this.pass === this.pass2) {
                this.error = '';
            }
        }
    }
}
</script>