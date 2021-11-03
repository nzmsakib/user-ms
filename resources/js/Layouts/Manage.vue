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

      <LeftVerticalNavbarComponent :isMenuCollapsed="isMenuCollapsedDelay" />

      <div class="collapseBtn d-flex align-items-center justify-center" @click="toggleMenuCollapse()">
        <Link>
          <i class="bi-arrow-left" v-if="!isMenuCollapsed"></i>
          <i class="bi-arrow-right" v-if="isMenuCollapsed"></i>
        </Link>
      </div>
    </div>

    <!-- Right space for main contents -->
    <div :class="isMenuCollapsed ? 'right-space expanded' : 'right-space'">
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
  background-color: darkslategray;
  transition: all 0.3s ease-in-out;
}

.left-space.shrinked {
  width: 88px;
}

.collapseBtn {
  font-size: 1.4rem;
  position: absolute;
  right: -40px;
  top: 0;
  width: 40px;
  height: 40px;
  background-color: darkslategray;
  color: white;
}

.collapseBtn i{
  transition: color 0.2s ease-in-out;
}

.collapseBtn:hover i {
  color: chartreuse;
}

.right-space {
  margin-left: 200px;
  height: 2000px;
  width: auto;
  background-color: gainsboro;
  transition: margin-left 0.3s ease-in-out;
}

.right-space.expanded {
  margin-left: 88px;
}
</style>