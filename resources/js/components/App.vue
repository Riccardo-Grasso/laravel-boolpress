<template>
  <div>
    <div class="container">
      <Navbar></Navbar>
      <div class="title-container text-center my-5">
        <h1 class="title">{{ helloMsg }}</h1>
      </div>

      <div class="posts-container rounded p-5 mb-5">
        <div class="container px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
              <h2 class="mb-5 text-center" v-if="postsList.length === 0">
                Nessun post disponibile
              </h2>

              <template v-else>
                <Post
                  v-for="post in postsList"
                  :key="post.id"
                  :post="post"
                ></Post>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "./partials/Navbar.vue";
import Post from "./partials/Post.vue";

export default {
  name: "App",
  components: { Navbar, Post },
  data() {
    return {
      helloMsg: "Benvenuto nel Blog di Boolean",
      postsList: [],
      categoryList: [],
    };
  },
  mounted() {
    window.axios.get("/api/posts").then((resp) => {
      this.postsList = resp.data;
    });
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
