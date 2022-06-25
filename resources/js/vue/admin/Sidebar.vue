<template>
  <aside>
    <div class="header">cafe</div>

    <div class="toggle-wrapper">
      <button class="toggle">
        <i class="fas fa-chevron-left"></i>
      </button>
    </div>
  </aside>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
@import "~@/_variables.scss";

aside {
  display: flex;
  flex-direction: column;
  background-color: #272727;
  font-size: 1rem;
  width: $sidebar-width;
  overflow: hidden;
  min-height: 100vh;
  transition: 0.2s ease-out;
  color: $text-white;

  @media (max-width: 768px) {
    position: fixed;
    z-index: 99;
  }
}
</style>