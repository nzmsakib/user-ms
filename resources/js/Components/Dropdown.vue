<template>
  <Link
    :href="href"
    :class="classes"
    :id="id"
    role="button"
    data-bs-toggle="dropdown"
    aria-expanded="false"
  >
    <slot />
  </Link>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },

  props: ["href", "active", "id"],

  computed: {
    classes() {
      return this.active
        ? "nav-link dropdown-toggle active"
        : "nav-link dropdown-toggle";
    },
  },
};
</script>
<style scoped>


</style>