<template>
    <div class="addProduct">
        <form>
            <input type="text" v-model="data" />
        </form>
    </div>
</template>

<script>
export default {
    data: () => {
        return {
            product: {
                name: "",
                price: 0,
                quantily: 1,
            },
        };
    },
};
</script>

<style></style>
