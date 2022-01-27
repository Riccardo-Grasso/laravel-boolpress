<template>
  <div>
    <div class="my-container rounded p-5 mb-5">
      <div class="container">
        <div>
          <h1>{{ post.title }}</h1>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: {
        type: Object,
        default: () => ({}),
      },
    };
  },
  methods: {
    fetchPost() {
      const url = "/api/posts/" + this.$route.params.slug;
      window.axios.get(url).then((resp) => {
        console.log(resp);
      });
    },
  },
  mounted() {
    this.fetchPost();
  },
};
</script>

<style>
</style>