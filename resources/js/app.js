require('./bootstrap');

import Global from './_global';
import CommerceType from './_commerceType';
import Commerce from './_commerce';
import ProductCategory from './_productCategory';
import Product from './_product';

let global = new Global();
let commerceType = new CommerceType();
let commerce = new Commerce();
let productCategory = new ProductCategory();
let product = new Product();

document.addEventListener("DOMContentLoaded", function (event) {
    global.initialize();
    commerceType.initialize();
    commerce.initialize();
    productCategory.initialize();
    product.initialize();
});
