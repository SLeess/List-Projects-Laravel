import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// import $ from '../../node_modules/jquery/dist/jquery.min.js';
// window.$ = window.jQuery = $;
