<script>
import ManageLayout from "@/Layouts/Manage.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
    layout: ManageLayout,

    components: {
        Head,
    },
    setup() {
                
    },
}
</script>

<template>
    <Head title="Edit Role" />

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          Good! You're in Role editing page!
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>