
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import pagination from 'laravel-vue-pagination'
import HighchartsVue from 'highcharts-vue'
import router from './routes'
import Vue from 'vue'
import swal from 'sweetalert2';
import Multiselect from 'vue-multiselect'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import Gate from './Gate'

Vue.component('multiselect', Multiselect)
Vue.use(VueRouter);
Vue.component('pagination', pagination);
Vue.use(HighchartsVue);
Vue.use(BootstrapVue);

window.swal = swal;
window.Fire = new Vue();

Vue.component('vue-password', {
    template: '<div class="input-group"><span class="input-group-addon"><span class="fa fa-lock"></span></span><input :type="type" class="form-control" :placeholder="placeholder" :value="user" /><span class="input-group-btn"><button type="button" class="btn btn-primary" @click="generate()"><span class="fa fa-refresh"></span>Generate</button></span></div>',
    props : {
      type: {
        type: String,
        default: 'text'
      },
      size: {
        type: String,
        default: '32'
      },
      characters: {
        type: String,
        default: 'a-z,0-9'
      },
      placeholder: {
        type: String,
        default: ''
      },
      auto: [String, Boolean],
      value: ''
    },
    data: function() {
      return {
        user: this.value
      }
    },
    mounted: function() {
      if(this.auto == 'true' || this.auto == 1) {
        this.generate();
      }
    },
    methods: {
      
      generate: function() {
        let charactersArray = this.characters.split(',');  
        let CharacterSet = '';
        let user = '';
        
        if( charactersArray.indexOf('a-z') >= 0) {
          CharacterSet += 'abcdefghijklmnopqrstuvwxyz';
        }
        if( charactersArray.indexOf('A-Z') >= 0) {
          CharacterSet += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if( charactersArray.indexOf('0-9') >= 0) {
          CharacterSet += '0123456789';
        }
        if( charactersArray.indexOf('#') >= 0) {
          CharacterSet += '![]{}()%&*$#^<>~@|';
        }
        
        for(let i=0; i < this.size; i++) {
          user += CharacterSet.charAt(Math.floor(Math.random() * CharacterSet.length));
        }
        this.user = user;
      }
      
    }
  });
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);


const app = new Vue({
    el: '#app',
    router,
    data:{
        search: '',
        message: 'hello'
    },
    methods:{
        searchit: _.debounce(() => {
            Fire.$emit('searching');
        },1000)
    }
});
