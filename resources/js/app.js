

require('./bootstrap');

window.Vue = require('vue');
//IMPORT VUE ROUTER via vuerouter.org
import VueRouter from 'vue-router';

Vue.use(VueRouter);//ON DIT A VUE D'UTILISER VUE ROUTER
//PAGINATION
Vue.component('pagination', require('laravel-vue-pagination'));

//MODAL ADDTASK

Vue.component('add-task', require('./components/AddTaskComponent.vue').default);

//MODAL ADDTASK

Vue.component('edit-task', require('./components/EditTaskComponent.vue').default);

//IMPORT COMPONENTS
import Home from './components/HomeComponent.vue';
import Task from './components/TaskComponent.vue';


//Vue.component('home-component', require('./components/HomeComponent.vue').default);
//Vue.component('task-component', require('./components/TaskComponent.vue').default);


//NOS ROUTES
const routes = [
    { path: '/home', component: Home },
    { path: '/tasks', component: Task }
]

//JE CREER UN OBJET ROUTES
const router = new VueRouter({
    routes
  });

//ON INITIALIZE NOTRE ROUTER
const app = new Vue({
    el: '#app',
    router:router
});
