<template>
    <div>
        <Header />

        <main>
            <div class="container">
                <h1>My Blog</h1>
                <div class="posts">
                    <div class="post" v-for="post in posts" :key="post.id">
                        <h2>{{ post.title }}</h2>
                        <div class="date">
                            {{ formatDate(post.created_at) }}
                        </div>
                        <a href="">Read More...</a>
                    </div>
                </div>
                <div class="navigation">
                    <button
                        @click="getPosts(pagination.current - 1)"
                        v-show="pagination.current > 1"
                    >
                        Prev
                    </button>

                    <button
                        @click="getPosts(pagination.current + 1)"
                        v-show="pagination.current < pagination.last"
                    >
                        Next
                    </button>
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
            posts: [],
            pagination: {}
        };
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts(page = 1) {
            axios
                .get(`http://127.0.0.1:8000/api/posts?page=${page}`)
                .then(res => {
                    this.posts = res.data.posts.data;
                    console.log(res.data.posts.data);
                    this.pagination = {
                        current: res.data.posts.current_page,
                        last: res.data.posts.last_page
                    };
                })
                .catch(err => {
                    console.log(err);
                });
        },
        formatDate(date) {
            const postDate = new Date(date);
            let day = postDate.getDate();
            let month = postDate.getMonth() + 1;
            let year = postDate.getFullYear();

            if (day < 10) {
                day = "0" + day;
            }

            if (month < 10) {
                month = "0" + month;
            }

            return `${day}-${month}-${year}`;
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
