import '../css/app.css'
import {createApp} from "vue";
import App from "./App.vue";
import axios from "axios";

axios.defaults.baseURL = import.meta.env.VITE_API_URL;

createApp(App).mount('#app');

