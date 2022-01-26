<template>
  <div>
    <div class="container">
      <Navbar></Navbar>
      <div class="title-container text-center my-5">
        <h1 class="title">{{ helloMsg }}</h1>
      </div>

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
