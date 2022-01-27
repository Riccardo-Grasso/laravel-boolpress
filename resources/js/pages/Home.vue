<template>
  <div>
    <div class="title-container text-center my-5">
      <h1 class="title">{{ helloMsg }}</h1>
    </div>
    <div class="my-container rounded p-5 mb-5">
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
        <div class="row">
          <div class="col d-flex justify-content-center">
            <nav>
              <ul class="pagination">
                <li>
                  <button class="page-link" @click="getData(currentPage - 1)">
                    Indietro
                  </button>
                </li>

                <li
                  v-for="page of lastPage"
                  :key="page"
                  class="page-item"
                  :class="{ active: currentPage === page }"
                >
                  <button class="page-link" @click="getData(page)">
                    {{ page }}
                  </button>
                </li>

                <li>
                  <button class="page-link" @click="getData(currentPage + 1)">
                    Avanti
                  </button>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Post from "../components/partials/Post.vue";
export default {
  components: { Post },
  data() {
    return {
      helloMsg: "Benvenuto nel Blog di Boolean",
      postsList: [],
      categoryList: [],
      currentPage: 1,
      lastPage: null,
    };
  },
  methods: {
    getData(page = 1) {
      window.axios.get("/api/posts?page=" + page).then((resp) => {
        this.postsList = resp.data.data;
        this.currentPage = resp.data.current_page;
        this.lastPage = resp.data.last_page;
      });
    },
  },
  mounted() {
    this.getData();
  },
};
</script>

<style>
</style>