<template>
  <div class="title-container text-center my-5">
    <h1 class="title">{{ helloMsg }}</h1>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      helloMsg: "Benvenuto nel Blog di Boolean",
    };
  },
};
</script>