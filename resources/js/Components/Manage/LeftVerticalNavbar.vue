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
        route().current("manage.users.index"),
        route().current("manage.users.create"),
        route().current("manage.users.show"),
        route().current("manage.users.edit"),
      ],
      isRolesNavActive: [
        route().current("manage.roles.index"),
        route().current("manage.roles.create"),
        route().current("manage.roles.show"),
        route().current("manage.roles.edit"),
      ],
      isRootNavActive: [route().current("manage.dashboard")],
    };
  },
  methods: {
    deactiveAllNavs() {
      // set active status false to all navs
      for (let i = 0; i < this.isRootNavActive.length; i++) {
        this.isRootNavActive[i] = false;
      }
      for (let i = 0; i < this.isUsersNavActive.length; i++) {
        this.isUsersNavActive[i] = false;
      }
      for (let i = 0; i < this.isRolesNavActive.length; i++) {
        this.isRolesNavActive[i] = false;
      }
    },
    rootNavClicked(idx) {
      this.deactiveAllNavs();
      this.isRootNavActive[idx] = true;
    },
    userNavClicked(idx) {
      this.deactiveAllNavs();
      this.isUsersNavActive[idx] = true;
    },
    roleNavClicked(idx) {
      this.deactiveAllNavs();
      this.isRolesNavActive[idx] = true;
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
        :href="route('manage.dashboard')"
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
        <i class="bi-person"></i>
        <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'">Users</span>
        <i class="bi-caret-down ms-1"></i>
      </NavLinkComponent>
      <div :class="isUsersNavActive.includes(true) ? 'collapse show' : 'collapse'" id="usersCollapse">
        <div class="card card-body py-0 pe-0 border-0 rounded-0">
          <ul class="nav flex-column">
            <li class="nav-item">
              <NavLinkComponent
                :class="isMenuCollapsed ? 'shrinked' : ''"
                :href="route('manage.users.index')"
                @click="userNavClicked(0)"
                :active="isUsersNavActive[0]"
              >
                <bi class="bi-people"></bi>
                <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'"
                  >All Users</span
                >
              </NavLinkComponent>
            </li>
            <li class="nav-item">
              <NavLinkComponent
                title="Create new users"
                :class="isMenuCollapsed ? 'shrinked' : ''"
                :href="route('manage.users.create')"
                @click="userNavClicked(1)"
                :active="isUsersNavActive[1]"
              >
                <i class="bi-person-plus"></i>
                <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'"
                  >Add New</span
                >
              </NavLinkComponent>
            </li>
          </ul>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <NavLinkComponent
        :class="isMenuCollapsed ? 'shrinked' : ''"
        :active="isRolesNavActive.includes(true)"
        data-bs-toggle="collapse"
        href="#rolesCollapse"
        aria-expanded="false"
        aria-controls="rolesCollapse"
      >
        <i class="bi-person"></i>
        <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'">Roles</span>
        <i class="bi-caret-down ms-1"></i>
      </NavLinkComponent>
      <div :class="isRolesNavActive.includes(true) ? 'collapse show' : 'collapse'" id="rolesCollapse">
        <div class="card card-body py-0 pe-0 border-0 rounded-0">
          <ul class="nav flex-column">
            <li class="nav-item">
              <NavLinkComponent
                :class="isMenuCollapsed ? 'shrinked' : ''"
                :href="route('manage.roles.index')"
                @click="roleNavClicked(0)"
                :active="isRolesNavActive[0]"
              >
                <bi class="bi-people"></bi>
                <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'"
                  >All Roles</span
                >
              </NavLinkComponent>
            </li>
            <li class="nav-item">
              <NavLinkComponent
                title="Create new users"
                :class="isMenuCollapsed ? 'shrinked' : ''"
                :href="route('manage.roles.create')"
                @click="roleNavClicked(1)"
                :active="isRolesNavActive[1]"
              >
                <i class="bi-person-plus"></i>
                <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'"
                  >Add New</span
                >
              </NavLinkComponent>
            </li>
          </ul>
        </div>
      </div>
    </li>

    <hr />
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

.nav-link.active[data-bs-toggle="collapse"],
.nav-link.shrinked.active[data-bs-toggle="collapse"] {
  clip-path: unset;
}

.nav-link[data-bs-toggle="collapse"] + .collapse .nav {
  border-left: 2px solid transparent;
}

.nav-link.active[data-bs-toggle="collapse"] + .collapse .nav {
  border-left: 2px solid red;
}

.nav-link.shrinked:not(.active):hover {
  color: chartreuse;
}

.nav-link.shrinked.active {
  clip-path: polygon(
    0% 100%,
    0% 0%,
    100% 0%,
    100% 30%,
    88% 50%,
    100% 70%,
    100% 100%
  );
}

.collapse .nav-link.shrinked.active {
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

.card-body {
  background-color: darkslategray;
}
</style>