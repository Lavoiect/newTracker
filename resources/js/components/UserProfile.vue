<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Assigned Projects</div>

          <div class="card-body">
            <ul>
              <li>{{title.title}}</li>
            </ul>
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
      users: {}
    };
  },
  methods: {
    loadUsers() {
      axios.get("showUsers").then(({ data }) => (this.users = data));
    }
  },
  created() {
    this.loadUsers();
  }
};
</script>
