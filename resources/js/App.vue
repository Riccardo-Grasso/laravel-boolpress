<template>
  <div>
    <div class="container">
      <Navbar></Navbar>

      <!-- inserisce il contenuto delle pages -->
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Navbar from "./components/partials/Navbar.vue";

export default {
  name: "App",
  components: { Navbar },
  data() {
    return {
      helloMsg: "Benvenuto nel Blog di Boolean",
    };
  },
};
</script>

<style lang="scss">
.container {
  posts-container {
    background-color: white;
  }
}
</style>
