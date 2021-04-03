require('./bootstrap');

import Global from './_global';
import Commerce from './_commerce';
import ProductCategory from './_productCategory';

let global = new Global();
let commerce = new Commerce();
let productCategory = new ProductCategory();

document.addEventListener("DOMContentLoaded", function (event) {
    global.initialize();
    commerce.initialize();
    productCategory.initialize();
});
