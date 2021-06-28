<template>
    <div class="container">
        <h2>{{ post.title }}</h2>
        <div class="badges">
            <div class="badge">{{ post.category.name }}</div>
            <span class="badge-small" v-for="type in post.types" :key="type.id">
                {{ type.name }}
            </span>
        </div>
        <p>{{ post.content }}</p>
        <small>{{ post.author }}</small>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "PostDetail",
    data() {
        return {
            post: ""
        };
    },
    created() {
        this.getDetails();
    },
    methods: {
        getDetails() {
            axios
                .get(
                    `http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`
                )
                .then(res => {
                    this.post = res.data;
                    console.log(this.post);
                });
        }
    }
};
</script>

<style></style>
