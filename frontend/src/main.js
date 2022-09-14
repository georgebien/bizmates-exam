import Vue from 'vue'
import App from './App.vue'
import axios from 'axios'
import 'bootstrap/dist/css/bootstrap.css'
import 'vue-select/dist/vue-select.css';


axios.defaults.baseURL = 'http://127.0.0.1:8000';

Vue.config.productionTip = false
new Vue({
  render: h => h(App),
}).$mount('#app')
