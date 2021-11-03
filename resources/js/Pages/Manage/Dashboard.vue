<script>
import AdminLayout from "@/Layouts/Manage.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
  layout: AdminLayout,

  components: {
    Head,
  },
};
</script>

<template>
  <Head title="Dashboard" />

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          Good! You're logged in!
          <h6><em>You are in site management dashboard.</em></h6>
        </div>
      </div>
    </div>
  </div>
</template>
