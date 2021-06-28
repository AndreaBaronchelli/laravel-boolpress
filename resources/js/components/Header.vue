<template>
    <header>
        <div class="container">
            <div class="left-header">
                <router-link :to="{ name: 'home' }">Boolpress</router-link>
            </div>
            <div class="right-header">
                <nav>
                    <ul>
                        <li>
                            <router-link :to="{ name: 'home' }"
                                >Home</router-link
                            >
                        </li>
                        <li>
                            <router-link :to="{ name: 'blog' }"
                                >Blog</router-link
                            >
                        </li>
                        <li>
                            <router-link :to="{ name: 'about' }"
                                >About</router-link
                            >
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "Header"
};
</script>

<style lang="scss" scoped></style>
