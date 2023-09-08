<template>
    <Sidebar /> <!-- Include the sidebar component -->
    <div class="container mt-3"> 
        <router-view> </router-view>
    </div>
</template>
 
<script>
    import Sidebar from './components/Sidebar.vue';
    export default {
        components: {
            Sidebar, // Register the Sidebar component
        },
    }
</script>