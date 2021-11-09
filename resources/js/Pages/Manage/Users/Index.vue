<script>
import ManageLayout from "@/Layouts/Manage.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
  layout: ManageLayout,

  components: {
    Head,
  },
  setup() {},
  props: ["users", 'roles'],
};
</script>

<template>
  <Head title="Users" />

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          Good! You're in Users listing page!
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="table-respon">
      <table class="table table-striped table-hover" v-if="users">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Date Created</th>
          <th scope="col">Date Updated</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(user, idx) in users" :key="user.id">
          <th scope="row">{{ idx }}</th>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ roles[user.role_id].title }}</td>
          <td>{{ user.created_at }}</td>
          <td>{{ user.updated_at }}</td>
          <td>
            <button class="btn btn-primary">Edit</button>
            <button class="btn btn-danger ms-2">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
</template>

<style scoped>
</style>