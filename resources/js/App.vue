<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link :to="{ name: 'dashboard' }" class="nav-item nav-link">Employees List</router-link>
                    <router-link :to="{ name: 'create-employee' }" class="nav-item nav-link">Add Employee</router-link>
                    <router-link :to="{ name: 'service-records' }" class="nav-item nav-link">Service Record List</router-link>
                    <router-link :to="{ name: 'create-service-record' }" class="nav-item nav-link">Add Service Record</router-link>
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>