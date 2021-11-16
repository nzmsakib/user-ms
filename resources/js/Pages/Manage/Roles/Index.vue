<script>
import ManageLayout from "@/Layouts/Manage.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
  layout: ManageLayout,

  components: {
    Head,
  },
  setup() {},
  props: ['roles'],
};
</script>

<template>
  <Head title="Roles" />

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          Good! You're in Roles listing page!
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="table-respon">
      <table class="table table-striped table-hover" v-if="roles">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(role, idx) in roles" :key="role.id">
          <th scope="row">{{ idx }}</th>
          <td>{{ user.name }}</td>
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