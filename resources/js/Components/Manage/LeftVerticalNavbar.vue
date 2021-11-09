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
      isNavActive: [
        route().current("manage.dashboard"),
        route().current("manage.users.index"),
        route().current("manage.users.create"),
        route().current("manage.users.show"),
        route().current("manage.users.edit"),
        route().current("manage.roles.index"),
        route().current("manage.roles.create"),
        route().current("manage.roles.show"),
        route().current("manage.roles.edit"),
      ],
      activeNavPos: -1,
    };
  },
  methods: {
    navClicked(idx) {
      if (this.activeNavPos < 0) {
        this.activeNavPos = this.isNavActive.indexOf(true);
      }
      this.isNavActive[this.activeNavPos] = false;
      this.isNavActive[idx] = true;
      this.activeNavPos = idx;
    },
    inBetween(n, a, b) {
      return (n - a) * (n - b) <= 0;
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
        :active="isNavActive[0]"
        @click="navClicked(0)"
      >
        <i class="bi-house"></i>
        <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'">Dashboard</span>
      </NavLinkComponent>
    </li>
    <li class="nav-item">
      <NavLinkComponent
        :class="isMenuCollapsed ? 'shrinked' : ''"
        :active="inBetween(isNavActive.indexOf(true), 1, 4)"
        data-bs-toggle="collapse"
        href="#usersCollapse"
        aria-expanded="false"
        aria-controls="usersCollapse"
      >
        <i class="bi-person"></i>
        <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'">Users</span>
        <i class="bi-caret-down ms-1"></i>
      </NavLinkComponent>
      <div :class="inBetween(isNavActive.indexOf(true), 1, 4) ? 'collapse show' : 'collapse'" id="usersCollapse">
        <div class="card card-body py-0 pe-0 border-0 rounded-0">
          <ul class="nav flex-column">
            <li class="nav-item">
              <NavLinkComponent
                :class="isMenuCollapsed ? 'shrinked' : ''"
                :href="route('manage.users.index')"
                @click="navClicked(1)"
                :active="isNavActive[1]"
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
                @click="navClicked(2)"
                :active="isNavActive[2]"
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
        :active="inBetween(isNavActive.indexOf(true), 5, 8)"
        data-bs-toggle="collapse"
        href="#rolesCollapse"
        aria-expanded="false"
        aria-controls="rolesCollapse"
      >
        <i class="bi-person"></i>
        <span :class="isMenuCollapsed ? 'd-none' : 'ms-2'">Roles</span>
        <i class="bi-caret-down ms-1"></i>
      </NavLinkComponent>
      <div :class="inBetween(isNavActive.indexOf(true), 5, 8) ? 'collapse show' : 'collapse'" id="rolesCollapse">
        <div class="card card-body py-0 pe-0 border-0 rounded-0">
          <ul class="nav flex-column">
            <li class="nav-item">
              <NavLinkComponent
                :class="isMenuCollapsed ? 'shrinked' : ''"
                :href="route('manage.roles.index')"
                @click="navClicked(5)"
                :active="isNavActive[5]"
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
                @click="navClicked(6)"
                :active="isNavActive[6]"
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