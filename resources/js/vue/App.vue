<template>
  <div class="app">
    <Sidebar></Sidebar>
    <main>
      <router-view :key="$route.path"></router-view>
    </main>
  </div>
</template>

<script>
import Sidebar from "./admin/Sidebar.vue";
export default {
  mounted() {},
  components: { Sidebar },
};
</script>

<style lang="scss">
@import "~@/variables.scss";
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");

.app {
  display: flex;
  font-family: "Roboto", sans-serif;

  button {
    appearance: none;
    background-color: transparent;
    border: none;
    color: $text-white;
  }

  main {
    flex: 1 1 0;
    padding: 2rem;

    @media (max-width: 768px) {
      padding-left: 0rem;
    }
  }
}
</style>
