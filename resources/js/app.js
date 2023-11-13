import './bootstrap';
import { createApp } from 'vue';
import ComponentA from './components/MyComponents/ComponentA.vue';
import ComponentB from './components/MyComponents/ComponentB.vue';
//import Welcome from './Pages/Welcome.vue';

const app = createApp({});

app
  .component('ComponentA', ComponentA)
  //.component('Head', ComponentA)
  //.component('Welcome', Welcome);
  .component('ComponentB', ComponentB);

app.mount("#app");
