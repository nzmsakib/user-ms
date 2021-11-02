<script>
import NavLinkComponent from "@/Components/NavLink.vue";
import DropdownComponent from "@/Components/Dropdown.vue";
import DropdownLinkComponent from "@/Components/DropdownLink.vue";

export default {
  components: {
    NavLinkComponent,
    DropdownComponent,
    DropdownLinkComponent,
  },
  data() {
    return {
      isUsersNavActive: [
        route().current("admin.users.index"),
        route().current("admin.users.create"),
        route().current("admin.users.show"),
        route().current("admin.users.edit"),
      ],
      isRootNavActive: [route().current("admin.dashboard")],
    };
  },
  methods: {
    rootNavClicked(idx) {
      for (let i = 0; i < this.isRootNavActive.length; i++) {
        this.isRootNavActive[i] = false;
      }
      this.isRootNavActive[idx] = true;
    },
    userNavClicked(idx) {
      for (let i = 0; i < this.isUsersNavActive.length; i++) {
        this.isUsersNavActive[i] = false;
      }
      this.isUsersNavActive[idx] = true;
    },
  },
  props: ["isMenuCollapsed"],
};
</script>

<template>
  <ul class="nav flex-column">
    <li class="nav-item">
      <NavLinkComponent
        :class="isMenuCollapsed ? 'shrinked' : ''"
        :href="route('admin.dashboard')"
        :active="isRootNavActive[0]"
        @click="rootNavClicked(0)"
      >
        <i class="bi-house"></i>
        <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'">Dashboard</span>
      </NavLinkComponent>
    </li>
    <li class="nav-item">
      <NavLinkComponent
        :class="isMenuCollapsed ? 'shrinked' : ''"
        :active="isUsersNavActive.includes(true)"
        data-bs-toggle="collapse"
        href="#usersCollapse"
        aria-expanded="false"
        aria-controls="usersCollapse"
      >
        <i class="bi-people"></i>
        <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'">Users</span>
        <i class="bi-caret-down ms-1"></i>
      </NavLinkComponent>
      <div class="collapse" id="usersCollapse">
        <div class="card card-body py-0">
          <ul class="nav flex-column">
            <li class="nav-item">
              <NavLinkComponent
                :href="route('admin.users.index')"
                @click="userNavClicked(0)"
                :active="isUsersNavActive[0]"
              >
                All Users
              </NavLinkComponent>
            </li>
            <li class="nav-item">
              <NavLinkComponent
                :href="route('admin.users.create')"
                @click="userNavClicked(1)"
                :active="isUsersNavActive[1]"
              >
                Add New
              </NavLinkComponent>
            </li>
            <li class="nav-item">
              <NavLinkComponent
                :href="route('admin.users.show')"
                @click="userNavClicked(2)"
                :active="isUsersNavActive[2]"
              >
                Manage Roles
              </NavLinkComponent>
            </li>
          </ul>
        </div>
      </div>
    </li>

    <hr />
    <li class="nav-item">
      <NavLinkComponent
        :class="isMenuCollapsed ? 'shrinked' : ''"
        :href="route('admin.dashboard')"
        :active="isRootNavActive[0]"
        @click="rootNavClicked(0)"
      >
        <i class="bi-house"></i>
        <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'">Dashboard</span>
      </NavLinkComponent>
    </li>
    <li class="nav-item">
      <NavLinkComponent
        :class="isMenuCollapsed ? 'shrinked' : ''"
        :href="route('admin.dashboard')"
        :active="isRootNavActive[0]"
        @click="rootNavClicked(0)"
      >
        <i class="bi-house"></i>
        <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'">Dashboard</span>
      </NavLinkComponent>
    </li>
    <li class="nav-item">
      <NavLinkComponent
        :class="isMenuCollapsed ? 'w-100 shrinked' : 'w-100'"
        :href="route('logout')"
        method="post"
        as="button"
      >
        <i class="bi-arrow-left-square"></i>
        <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'">Logout</span>
      </NavLinkComponent>
    </li>
  </ul>
</template>

<style scoped>
.nav-item {
  background-color: gainsboro;
  margin: 2px 0;
}
.nav-link,
.dropdown-item {
  background-color: darkslategray;
  color: white;
  font-size: 1.2rem;
  transition: all 0.3s ease-in-out;
}

.nav-link:not(.active):hover,
.dropdown-item:not(.active):hover {
  color: chartreuse;
}

.nav-link.active {
  background-color: red;
  clip-path: polygon(
    0% 100%,
    0% 0%,
    100% 0%,
    100% 30%,
    95% 50%,
    100% 70%,
    100% 100%
  );
}

.nav-link.shrinked:not(.active):hover {
  color: chartreuse;
}

.nav-link.shrinked.active {
  background-color: red;
  clip-path: polygon(
    0% 100%,
    0% 0%,
    100% 0%,
    100% 30%,
    85% 50%,
    100% 70%,
    100% 100%
  );
}

.nav-link[data-bs-toggle="collapse"]:hover {
}

.card-body {
  background-color: darkslategray;
}
</style>