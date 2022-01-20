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
      <img :src="post.coverImg" class="card-img-top" alt="post_img" />
      <div class="card-body article">
        <div class="d-flex justify-content-between">
          <h4 class="card-title">{{ post.title }}</h4>

          <div>
            <span class="badge bg-primary" style="color: white">{{
              post.category.name
            }}</span>
          </div>
        </div>
        <h5 class="card-subtitle mb-2 text-muted">{{ post.subtitle }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">
          Scritto da {{ post.user.name }}
        </h6>
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

<style>
.article {
  position: relative;
}

.article:after {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  content: "";
  background: linear-gradient(
    to top,
    rgba(255, 255, 255, 1) 24%,
    rgba(255, 255, 255, 0) 76%
  );
  pointer-events: none; /* so the text is still selectable */
}
</style>