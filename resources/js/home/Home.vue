<template>
    <div>
        <Header></Header>
        <main>
            <section class="home">
                <div
                    class="home__products"
                    v-for="product in products"
                    :key="product.id"
                >
                    <h1>{{ product.name }}</h1>
                </div>
                <Footer></Footer>
            </section>
        </main>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import Header from "./Header.vue";
import Footer from "./Footer.vue";

export default {
    components: { Header, Footer },
    computed: {
        ...mapGetters("products", ["products"]),
    },
    created() {
        this.$store.dispatch("products/loadProducts");
    },
};
</script>

<style lang="scss" scoped>
main {
    height: 100%;
    width: 100%;
}
</style>
