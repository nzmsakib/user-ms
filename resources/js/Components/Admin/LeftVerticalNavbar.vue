<script>
import NavLinkComponent from '@/Components/NavLink.vue'

export default {
  components: {
    NavLinkComponent,
  },
    setup() {
        
    },
}
</script>

<template>
    <ul class="nav flex-column">
        <li class="nav-item">
          <NavLinkComponent class="" :href="route('admin.dashboard')">
              <i class="bi bi-house"></i> Dashboard
          </NavLinkComponent>
        </li>
        <li class="nav-item">
          <NavLinkComponent class="" :href="route('admin.users.index')">
              Users
          </NavLinkComponent>
        </li>
        <li class="nav-item">
          <NavLinkComponent class="">
              Another
          </NavLinkComponent>
        </li>
        <li class="nav-item">
          <NavLinkComponent class="disabled">
              Disabled
          </NavLinkComponent>
        </li>
      </ul>
</template>

<style scoped>

.nav {
  color: white;
}
</style>