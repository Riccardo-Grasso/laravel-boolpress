<template>
  <div>
    <div class="my-container rounded p-5 mb-5">
      <div class="container">
        <div>
          <h1 class="mb-5">Contattaci</h1>
        </div>
        <form @submit.prevent="onSubmit" v-if="!messageSent">
          <div class="form-group mb-3">
            <label for="field_name" class="form-label">Nome</label>
            <input
              type="text"
              id="field_name"
              class="form-control"
              name="name"
              v-model="form.name"
            />
          </div>

          <div class="form-group mb-3">
            <label for="field_email" class="form-label">Email</label>
            <input
              type="email"
              id="field_email"
              class="form-control"
              name="email"
              v-model="form.email"
            />
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Messaggio</label>
            <textarea
              type="text"
              class="form-control"
              rows="5"
              v-model="form.message"
            ></textarea>
          </div>

          <button class="btn btn-success">Invia</button>
        </form>

        <div class="alert alert-success" v-else>
          Il tuo messaggio è stato inviato. Ti risponderemo il prima possibile.
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      messageSent: false,
      form: {
        name: "",
        email: "",
        message: "",
      },
    };
  },
  methods: {
    onSubmit() {
      window.axios.post("/api/contacts", this.form).then((resp) => {
        this.messageSent = true;
      });
    },
  },
};
</script>

<style>
</style>