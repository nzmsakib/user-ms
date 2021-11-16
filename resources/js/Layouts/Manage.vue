<script>
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
import NavLinkComponent from "@/Components/NavLink.vue";
import LeftVerticalNavbarComponent from "@/Components/Manage/LeftVerticalNavbar.vue";

export default {
  components: {
    BreezeApplicationLogo,
    Link,
    NavLinkComponent,
    LeftVerticalNavbarComponent,
  },
  data() {
    return {
      isMenuCollapsed: false,
      isMenuCollapsedDelay: false,
    };
  },

  methods: {
    toggleMenuCollapse() {
      this.isMenuCollapsed = !this.isMenuCollapsed;

      if (!this.isMenuCollapsed) {
        setTimeout(() => {
          this.isMenuCollapsedDelay = this.isMenuCollapsed;
        }, 200);
      } else {
        this.isMenuCollapsedDelay = this.isMenuCollapsed;
      }
    },
  },
};
</script>

<template>
  <div>
    <!-- Left side bar for navigation links -->
    <div
      :class="
        isMenuCollapsed
          ? 'left-space shrinked text-center'
          : 'left-space'
      "
    >
      <!-- Logo -->
      <div class="d-flex justify-center my-3">
        <Link :href="route('dashboard')">
          <BreezeApplicationLogo class="block h-9 w-auto" />
        </Link>
      </div>

      <LeftVerticalNavbarComponent />
    </div>

    <!-- Right space for main contents -->
    <div :class="isMenuCollapsed ? 'right-space expanded' : 'right-space'">
      <!-- Top navigation bar on right side -->
      <div class="topNavbar">
        <div class="btn" @click="toggleMenuCollapse()">
          <i class="bi-arrow-left" v-if="!isMenuCollapsed"></i>
          <i class="bi-arrow-right" v-if="isMenuCollapsed"></i>
        </div>


      </div>

      <slot />
    </div>
  </div>
</template>

<style scoped>
.left-space {
  position: fixed;
  left: 0;
  top: 0;
  width: 240px;
  height: 100vh;
  background-color: darkslategray;
  transition: all 0.3s ease-in-out;
}

.left-space.shrinked {
  left: -240px;
}

.right-space {
  margin-left: 240px;
  height: 2000px;
  width: auto;
  background-color: gainsboro;
  transition: margin-left 0.3s ease-in-out;
}

.right-space.expanded {
  margin-left: 0;
}

.topNavbar {
  width: 100%;
  height: 56px;
  background-color: darkslategray;
}

.topNavbar .btn {
  font-size: 1.6rem;
  color: white;
  height: 100%;
  margin: 0;
}

.topNavbar .btn:hover {
  background-color: red;
}

</style>