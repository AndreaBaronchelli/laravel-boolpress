<template>
    <div>
        <Header />

        <main>
            <div class="container">
                <h1>My Blog</h1>
                <div class="posts">
                    <div class="post" v-for="post in posts" :key="post.id">
                        <h2>{{ post.title }}</h2>
                        <div class="date">{{ post.created_at }}</div>
                        <a href="">Read More...</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
import axios from "axios";
import Header from "./components/Header.vue";
export default {
    name: "App",
    components: {
        Header
    },
    data() {
        return {
            posts: []
        };
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios
                .get("http://127.0.0.1:8000/api/posts")
                .then(res => {
                    this.posts = res.data.posts;
                    console.log(res.data.posts);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>

<style lang="scss">
@import "../sass/frontoffice/_utilities.scss";
body {
    font-family: Arial, Helvetica, sans-serif;
}
</style>
