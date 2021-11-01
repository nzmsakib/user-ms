<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from '@inertiajs/inertia-vue3';
import NavLinkComponent from "@/Components/NavLink.vue";
import LeftVerticalNavbarComponent from "@/Components/Admin/LeftVerticalNavbar.vue";

export default {
  components: {
    BreezeApplicationLogo,
    Link,
    NavLinkComponent,
    LeftVerticalNavbarComponent,
  },
  setup() {},
};
</script>

<template>
  <div>
    <!-- Left side bar for navigation links -->
    <div class="left-space">
      <!-- Logo -->
      <div class="flex-shrink-0 flex items-center">
        <Link :href="route('dashboard')">
          <BreezeApplicationLogo class="block h-9 w-auto" />
        </Link>
      </div>

      <LeftVerticalNavbarComponent />
    </div>

    <!-- Right space for main contents -->
    <div class="right-space">
      <slot />
    </div>
  </div>
</template>

<style scoped>
.left-space {
  position: fixed;
  left: 0;
  top: 0;
  width: 200px;
  height: 100vh;
  background-color: black;
  padding: 8px;
}

.right-space {
    margin-left: 200px;
    height: 2000px;
  width: auto;
  background-color: green;
}
</style>