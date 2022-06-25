<template>
  <header>
    <div class="menu-btn">
      <span class="menu-btn__burger"></span>
    </div>

    <nav class="nav">
      <ul class="menu-nav">
        <li class="menu-nav__item">
          <router-link class="menu-nav__link" to="/"
            ><i class="fas fa-home"></i> Trang chủ</router-link
          >
        </li>
        <li class="menu-nav__item">
          <router-link class="menu-nav__link" to="/about"
            >Giới thiệu</router-link
          >
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
header {
  position: fixed;
  z-index: 2;
  width: 100%;
  padding: 1rem;
}
</style>
