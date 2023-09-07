import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router'; // Import createWebHistory from vue-router
import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './App.vue';
import { routes } from './routes';

const app = createApp(App);

// Install plugins
app.use(VueAxios, axios);

// Create and configure router
const router = createRouter({
  history: createWebHistory(), // Use createWebHistory here
  routes: routes,
});

app.use(router);

// Mount the app
app.mount('#app');
