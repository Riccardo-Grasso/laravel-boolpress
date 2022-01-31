<template>
  <div v-if="post.user">
    <div class="my-container rounded p-5 mb-5">
      <div class="container">
        <div>
          <img :src="post.coverImg" class="w-100" alt="post_img" />
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
            <h6 class="card-subtitle mb-2 text-muted mb-4">
              Scritto da {{ post.user.name }} - {{ creationDate }}
            </h6>
            <p class="card-text" v-html="post.text"></p>
          </div>
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
        this.post = resp.data;
      });
    },
  },
  mounted() {
    this.fetchPost();
  },
  computed: {
    creationDate() {
      return window.dayjs(this.post.created_at).format("DD/MM/YYYY");
    },
  },
};
</script>

<style>
</style>