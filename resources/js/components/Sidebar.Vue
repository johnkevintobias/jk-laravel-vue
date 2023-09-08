<template>
  <nav id="sidebar" class="bg-light">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <router-link :to="{ name: 'dashboard' }" class="nav-item nav-link">Employees List</router-link>
      </li>
      <li class="nav-item">
        <router-link :to="{ name: 'create-employee' }" class="nav-item nav-link">Add Employee</router-link>
      </li>
      <li class="nav-item">
        <router-link :to="{ name: 'service-records' }" class="nav-item nav-link">Service Record List</router-link>
      </li>
      <li class="nav-item">
        <router-link :to="{ name: 'create-service-record' }" class="nav-item nav-link">Add Service Record</router-link>
      </li>
    </ul>
  </nav>
</template>


<script>
export default {
  name: 'Sidebar',
};
</script>

<style scoped>
/* Add your sidebar-specific styles here */
#sidebar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 250px;
  padding-top: 20px;
}
</style>
