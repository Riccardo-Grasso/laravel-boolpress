<template>
  <div>
    <div class="title-container text-center my-5">
      <h1 class="title">{{ helloMsg }}</h1>
    </div>
    <div class="my-container rounded p-5 mb-5">
      <!-- main -->
      <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
          <div class="col-9">
            <h3>
              Ultimi
              <select
                class="form-select d-inline-block"
                style="width: 80px"
                @change="onLimitChange($event)"
              >
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
              </select>
              post
            </h3>

            <div class="progress" v-if="loading">
              <div
                class="progress-bar progress-bar-striped progress-bar-animated"
                role="progressbar"
                aria-valuenow="100"
                aria-valuemin="0"
                aria-valuemax="100"
                style="width: 100%"
              ></div>
            </div>

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
          <!-- Sidebar -->
          <div class="col-3">
            <h3>Lista categorie</h3>
            <ul class="categories-list">
              <li v-for="category in categoriesList" :key="category.id">
                <router-link
                  :to="{
                    name: 'posts.index',
                    query: { category: category.id },
                  }"
                >
                  {{ category.name }}
                </router-link>
              </li>
            </ul>
          </div>
        </div>
        <!--         <div class="row">
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
        </div> -->
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
      categoriesList: [],
      loading: true,
    };
  },
  methods: {
    getData(limit = 5) {
      window.axios.get("/api/posts?limit=" + limit).then((resp) => {
        this.postsList = resp.data;
        this.loading = false;
      });
    },

    getCategories() {
      window.axios.get("/api/categories").then((resp) => {
        this.categoriesList = resp.data;
      });
    },

    onLimitChange(event) {
      const limit = event.target.value;

      this.getData(limit);
    },
  },
  mounted() {
    this.getData();
    this.getCategories();
  },
};
</script>

<style>
</style>