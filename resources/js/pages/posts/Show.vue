<template>
  <div>
    <div class="my-container rounded p-5 mb-5">
      <div class="container">
        <div>
          <h1>Post</h1>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    fetchPost() {
      window.axios.get("/api/posts/" + this.$route.params.slug);
    },
  },
  mounted() {
    this.fetchPost();
  },
};
</script>

<style>
</style>