<template>
    <div class="container">
        <article class="userCard">
                <a href="" class="nameUser"><i class="fas fa-user-circle"></i> {{ user.firstname }} {{ user.lastname }}</a>
                <small class="age"><i class="fas fa-birthday-cake"></i> {{ user.birthdate }}</small>
            <div>
                <div class="love"><i class="fas fa-heart"></i> {{ user.love_item }}</div>
                <div class="hate"><i class="far fa-heart"></i> {{ user.like_item }}</div>
                <div class="like"><i class="fas fa-heart-broken"></i> {{ user.hate_item }}</div>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        props: {
            user: null
        }
    }
</script>