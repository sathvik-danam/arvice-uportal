
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform';

import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);

import swal from 'sweetalert2'
window.swal = swal;
const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast = toast;

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
 
Vue.component('pagination', require('laravel-vue-pagination'));

import VueRouter from 'vue-router' 
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red', 
  height: '12px'
})

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/partners', component: require('./components/Partners.vue').default },
    { path: '/city', component: require('./components/City.vue').default },
    { path: '/category', component: require('./components/Category.vue').default },
    { path: '/subcategory', component: require('./components/Subcategory.vue').default },
    { path: '/post', component: require('./components/Post.vue').default },
    { path: '/enquiry', component: require('./components/Enquiry.vue').default },
    { path: '/create-new-invitation', component: require('./front/Invitation.vue').default },
    { path: '/guest-email-list', component: require('./front/GuestEmail.vue').default },
    { path: '/guest-phone-list', component: require('./front/GuestPhone.vue').default }, 
    // { path: '*', component: require('./components/NotFound.vue').default },
  ]

  const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })
 
  Vue.filter('upText', function(text){
      return text.charAt(0).toUpperCase() + text.slice(1)
  });

  Vue.filter('myDate',function(created){
    return moment(created).format('MMMM Do YYYY');
  });

window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('login-component', require('./front/Login.vue').default);
Vue.component('profile-component', require('./components/Profile.vue').default);
Vue.component('partner-component', require('./front/MyProfession.vue').default); 
Vue.component('search-component', require('./components/Searchpanel.vue').default);
Vue.component('nofound-component', require('./components/NotFound.vue').default);
Vue.component('invitation-component', require('./front/Invitation.vue').default);
Vue.component('guestEmail-component', require('./front/GuestEmail.vue').default);
Vue.component('guestPhone-component', require('./front/GuestPhone.vue').default); 
Vue.component('category-component', require('./front/Post-Invitation.vue').default);
Vue.component('event-component', require('./front/Event.vue').default);
Vue.component('guestlist-component', require('./front/GuestList.vue').default);
 
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 
Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);

Vue.component(
  'not-found',
  require('./components/NotFound.vue').default
);



const app = new Vue({
    el: '#app', 
    router,
    data:{
      search: '',
      posts: {},
      cities: {} 
    },
    methods:{
      searchit: _.debounce(()=> {
        Fire.$emit('searching');
      },1000),
      loadSubcategories(){
        axios.get("api/mypost").then(({ data }) => (this.posts = data));
        },
        loadCities(){
                axios.get("api/city").then(({ data }) => (this.cities = data));
        }
        },
        mounted() {
        this.loadSubcategories();
        this.loadCities();
        }
});
$('#summernote').summernote({
  height: 150,
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
});