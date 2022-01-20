<template>
  <!-- Post preview-->
  <!--   <div class="post-preview">
    <a href="#">
      <h2 class="post-title">
        {{ post.title }}
      </h2>
    </a>
  </div> -->

  <div class="col">
    <div class="card my-3">
      <div class="card-body">
        <h4 class="card-title">{{ post.title }}</h4>
        <h5 class="card-subtitle mb-2 text-muted">{{ post.subtitle }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">By {{ post.author }}</h6>
        <p class="card-text" v-html="post.text"></p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Post",
  props: {
    post: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style></style>