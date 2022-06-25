import axios from "axios";

const URL = "http://localhost:8000/api";
const products = {
    namespaced: true,
    state: {
        products: [],
    },
    getters: {
        products: (state) => state.products,
    },
    actions: {
        async loadProducts({ commit }) {
            const response = await axios.get(`${URL}/products`);
            commit("SET_PRODUCTS", response.data);
        },
        async addProduct({ commit }, product) {
            const response = await axios.post(`${URL}/store`, product);
            commit("ADD_PRODUCT", response.data);
        },
        async updateProducts({ commit }, product) {
            const response = await axios.put(
                `${URL}/product/${product.id}`,
                product
            );
            commit("updateProduct", response.data);
        },
        async deleteProducts({ commit }, product) {
            const response = await axios.delete(`${URL}/product/${product.id}`);
            commit("deleteProduct", product);
        },
    },
    mutations: {
        SET_PRODUCTS(state, data) {
            state.products = data;
        },
        ADD_PRODUCT(state, data) {
            //state.products = data;
        },
    },
};

export default products;
