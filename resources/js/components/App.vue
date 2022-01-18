<template>
  <div>
    <Navbar></Navbar>

    <div class="title-container text-center my-5">
      <h1 class="title">{{ helloMsg }}</h1>
    </div>
  </div>
</template>

<script>
import Navbar from "./partials/Navbar.vue";

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

