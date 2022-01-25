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
        <div class="d-flex justify-content-between mb-2">
          <h4 class="card-title">{{ post.title }}</h4>
          <div class="text-cont">
            <div>
              <strong
                ><em> Categoria: {{ post.category.name }}</em></strong
              >
            </div>
            <div>
              <span
                v-for="tag in post.tags"
                :key="tag.id"
                class="badge bg-success ml-1"
                style="color: white"
                >{{ tag.name }}</span
              >
            </div>
          </div>
        </div>
        <h5 class="card-subtitle mb-2 text-muted">{{ post.subtitle }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">
          Scritto da {{ post.user.name }} -
          {{ creationDate }}
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
  computed: {
    creationDate() {
      return window.dayjs(this.post.created_at).format("DD/MM/YYYY");
    },
  },
};
</script>

<style>
.text-cont {
  text-align: end;
}

.card-img-top {
  height: 250px;
  object-fit: cover;
  object-position: center;
}

.card-body {
  height: 250px;
  overflow: hidden;
}
</style>