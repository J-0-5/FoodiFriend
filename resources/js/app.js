require('./bootstrap');

import Global from './_global';
import Commerce from './_commerce';

let global = new Global();
let commerce = new Commerce();

document.addEventListener("DOMContentLoaded", function (event) {
    global.initialize();
    commerce.initialize();
});
