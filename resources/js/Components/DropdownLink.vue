<template>
  <Link :href="href" :class="classes">
    <slot />
  </Link>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Link,
  },
  props: ["href", "active"],
  computed: {
    classes() {
      return this.active ? "dropdown-item active" : "dropdown-item";
    },
  },
};
</script>

<style scoped>


</style>