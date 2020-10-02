"use strict"

let likesTotal = document.querySelector('.like-me');
let likesCounter=0;

let hearts = document.querySelectorAll('.fa-thumbs-up');

    
for (let heart of hearts) {

    heart.onclick = function () {
        if (heart.classList.contains('added')) {
            +(likesTotal.textContent)--; 
        } else {
            +(likesTotal.textContent)++;
            
        }
        heart.classList.toggle('added');
    }
}

let addToCart= document.querySelectorAll('.fa-shopping-cart');
for (let i=0; i<addToCart.length; i++){
    console.log(addToCart[i]);
   }
const sidebar=document.querySelectorAll('sidebar');
const sidebarToggle = document.querySelector('.sidebar-toggle');
const closeBtn = document.querySelector('close-btn');
let countItemsInCart=
    //console.dir(sidebarToggle)

    sidebarToggle.addEventListener('click', function(){
       sidebar.classList.add('show-sidebar');
    })

closeBtn.addEventListener('click',function(){
  sidebar.classList.remove('show-sidebar');

})

for (let i=0; i<addToCart.length;i++) {
    addToCart[i].addEventListener('click', function(){
    countItemsInCart.textContent++;
    })
}
const cartItems=document.querySelector("cart-items");
cartItems.addEventListener('click', function(event){
    if(event.target.class)

})

    