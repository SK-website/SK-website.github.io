"use strict"

const likesTotal = document.querySelector('.like-me');
let hearts = document.querySelectorAll('.fa-thumbs-up');
const addToCart = document.querySelector('.to-cart');
let adds = document.querySelectorAll('.fa-shopping-cart');
let cartTitles = document.querySelectorAll('.cart-title');
const sidebarOpen = document.querySelector('.fa-shopping-basket');
const sidebar = document.querySelector('.sidebar');

let heartTitles = document.querySelectorAll('.heart-title');
const cartItems = document.querySelector('.cart-items');
const trash = document.querySelector('.fa-trash-alt');
const closeBtn = document.querySelector('.close-btn');


//open/close sidebar
sidebarOpen.addEventListener ('click', function () {
sidebar.classList.toggle('show-sidebar');
});

closeBtn.addEventListener('click', function (){
    sidebar.classList.toggle('show-sidebar');
});

 /* счетчика лайков + смена вида кнопки и подсказки, если товар уже был отмечен*/  
for (let i=0; i<hearts.length; i++) {
    hearts[i].addEventListener ('click', function (){
        if (hearts[i].classList.contains('added')) {
            +(likesTotal.textContent)--;
            heartTitles[i].title="Нравится";
        } else {
            +(likesTotal.textContent)++;
            heartTitles[i].title=":-( Больше не нравится";
        }
        hearts[i].classList.toggle('added');
    })
}
/* счетчик товаров в корзине + смена вида кнопки и подсказки, если товар уже в корзине*/ 
for (let i=0; i<adds.length; i++) {
    adds[i].addEventListener ('click', function (){
    if (adds[i].classList.contains('added')) {
            +(addToCart.textContent)--; 
            cartTitles[i].title="В корзину";
        } else {
            +(addToCart.textContent)++;
            cartTitles[i].title="Уже в корзине";
        }
        adds[i].classList.toggle('added');
    })
}

cartItems.addEventListener('click', function(event){
        
    if (event.target.classList.contains('fa-caret-right')) { //Увелич кол-ва тов-ра в корзине
        +event.target.previousElementSibling.innerText++;
        //Увеличение субтотал
        event.target.parentNode.parentNode.nextElementSibling.lastChild.
        previousElementSibling.innerText = '(' + String(+event.target.parentNode.
            parentNode.nextElementSibling.firstChild.nextElementSibling.innerText*
            +event.target.previousElementSibling.innerText) + ')';
                    
        //Уменьшение кол-ва товара в корзине+ограничения на уменьшение < "0" 
        } else if (event.target.classList.contains('fa-caret-left') 
        && +event.target.nextElementSibling.innerText>0) {
            +event.target.nextElementSibling.innerText--;
            //Уменьшение субтотал
            event.target.parentNode.parentNode.nextElementSibling.lastChild.
            previousElementSibling.innerText = '(' + String(+event.target.parentNode.
                parentNode.nextElementSibling.firstChild.nextElementSibling.innerText*
                +event.target.nextElementSibling.innerText) + ')';
                if (event.target.nextElementSibling.innerText==0) {
                event.target.parentNode.parentNode.nextElementSibling.lastChild.
            previousElementSibling.innerText = ''; }       
        }
    if(event.target.classList.contains('fa-trash-alt')) {
        event.target.parentNode.parentNode.parentNode.remove(this);//удаление по клику на корзину
    }
})