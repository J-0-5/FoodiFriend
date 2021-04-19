require('./bootstrap');

import Global from './_global';
import CommerceType from './_commerceType';
import Commerce from './_commerce';
import ProductCategory from './_productCategory';
import Product from './_product';
import Order from './_order';

let global = new Global();
let commerceType = new CommerceType();
let commerce = new Commerce();
let productCategory = new ProductCategory();
let product = new Product();
let order = new Order();

document.addEventListener("DOMContentLoaded", function (event) {
    global.initialize();
    commerceType.initialize();
    commerce.initialize();
    productCategory.initialize();
    product.initialize();
    order.initialize();
});

$(document).ready(function(){
    $("#menu-toggle").click(function(e){
      e.preventDefault();
      $("#wrapper").toggleClass("menuDisplayed");
    });
  });
