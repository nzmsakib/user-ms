<script>
import AdminLayout from "@/Layouts/Admin.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
    layout: AdminLayout,

    components: {
        Head,
    },
    setup() {
                
    },
}
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
</template>

<style scoped>

</style>