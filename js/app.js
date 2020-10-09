"use strict"

const addToCart = document.querySelector('.to-cart');
const sidebarOpen = document.querySelector('.fa-shopping-basket');
const sidebar = document.querySelector('.sidebar');
const trash = document.querySelector('.fa-trash-alt');
const closeBtn = document.querySelector('.close-btn');
const likesTotal = document.querySelector('.like-me');
console.log(likesTotal);
const clearCart = document.querySelector('.clear-cart');

let cartTitles = document.querySelectorAll('.cart-title');

function subtotals(){
let itemsInCart = document.querySelectorAll('.cart-item');
    for (let item of itemsInCart){
        let price = item.querySelector('.product-price').textContent;
        let amount = item.querySelector('.amount').textContent;
        item.querySelector('.product-subtotal').textContent = price*amount;
    }
};


//Шаблонные строки (для создания карточки товара) обратные кавычки ``
function createProduct(data) {
    return `
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
        <div class="card text-center" data-id="${data.id}">
            <div class="position-relative mb-3">
                <img src="${data.image}" class="img-fluid" alt="${data.name}">
                <div class="card-overlay">
                <ul class="list-inline">
                    <li class="li-inline">
                        <a href="#" title="Нравится"
                            class="heart-title btn btn-sm btn-outline-dlikesark"><i
                            class="far fa-thumbs-up"></i></a>
                        <a href="#" 
                            class="cart-title btn btn-sm btn-outline-dark"><button class="btn-cart" data-id="${data.id}"
                            title="В корзину"><i class="fas fa-shopping-cart"></i></button></a>
                        <a href="detail.html" title="Подробнее"
                            class="btn btn-sm btn-outline-dark"><i
                            class="fas fa-info-circle"></i></a>
                    </li>
                </ul>
                </div>
            </div>
            <section class="section-style">
                <h4 class="product-name">${data.name}</h4>
                <p class="product-price small text-muted">${data.price}</p>
                <p class="author small text-muted">${data.author}</p>
            </section>
        </div>
    </div>
    `
};

        
//Добавление товарав в корзину через шаблонные строки
function createCartItem(item) {
    const div = document.createElement('div');
    div.className = "cart-item";
    div.setAttribute("id", item.id);

    div.innerHTML =
    `
            <div class="picture product-img">
                <img src="${item.image}" alt="${item.name}"
                class="img-fluid w-100">
            </div>
            <div class="product-name">${item.name}
            </div>
            <div class="remove-btn text-right">
                <a href="#" class="reset-anchor m-auto" title="Удалить из корзины">
                <i class="fas fa-trash-alt" data-id="${item.id}"></i></a>
            </div>
            <div class="quantity">
                <div class="border d-flex justify-content-around mx-auto">
                <i class="fas fa-caret-left" data-id="${item.id}"></i>
                    <span class="border-1 p-1 amount">${item.amount}</span>
                    <i class="fas fa-caret-right" data-id="${item.id}"></i>
                </div>
            </div> 
            <div class="price">
                $ <span class="product-price">${item.price}</span>
                <span class="product-subtotal"></span>
            </div>
    `
    cartItems.append(div);
};

const cartItems = document.querySelector('.cart-items');
let cart = [];
console.log(cart);
function getProduct(id){
    return products.find(product => product.id===+(id))

};

function addProductToCart() {
    const addToCartButtons = [...document.querySelectorAll('.btn-cart')];
        addToCartButtons.forEach(button => {
        button.addEventListener('click', function (event){
            let cartItem = {...getProduct(event.target.closest('.card').getAttribute('data-id')), amount: 1}
            cart = [...cart, cartItem];
            console.log(cart);
            createCartItem(cartItem);
            +(addToCart.textContent)++;
            button.title="Уже в корзине";
            button.classList.add('added');
            
             
            
            subtotals()
        })
    })
};

function clearAll(){
    cart = [];
    while(cartItems.children.length>0){
        cartItems.removeChild(cartItems.children[0]);
        addToCart.textContent='0';
    } 
    subtotals();
    let btnCarts=document.querySelectorAll('.btn-cart');
    for(let btnCart of btnCarts) {
        btnCart.classList.remove('added');
    }
};

const filterItem = (cart, filteredItem) => cart.filter(item => item.id != 
    +(filteredItem.dataset.id));

    
const findItem = (cart, findingItem) => cart.find(item => item.id === 
    +(findingItem.dataset.id));


function btnClassRemove(btnCartId) {
let btns = document.querySelectorAll('.btn-cart');
console.log(btns);
   for (let btn of btns) {
        if (+btn.dataset.id == btnCartId) {
            btn.classList.remove('added');
            btn.title="В корзину";
        } 
    }
};


function renderCart() {
    //очистка всей корзины
    clearCart.addEventListener('click', () => clearAll());
    cartItems.addEventListener('click', event => {
        
        if(event.target.classList.contains('fa-trash-alt')) {
            console.log(event.target);
            let itemAmount = findItem(cart, event.target);
            addToCart.textContent = +addToCart.textContent - itemAmount.amount;
            let btnCartId = event.target.getAttribute('data-id');
            console.log(btnCartId);
            btnClassRemove(btnCartId);
            cart = filterItem(cart, event.target);
            cartItems.removeChild(event.target.parentElement.parentElement.parentElement);
             
        } else if (event.target.classList.contains('fa-caret-right')) {
            console.log(event.target);
            let tmp = findItem(cart, event.target);
            console.log(tmp);
            tmp.amount = tmp.amount + 1;
            +(addToCart.textContent)++;
            event.target.previousElementSibling.innerText = tmp.amount;
            subtotals();
        } else if (event.target.classList.contains('fa-caret-left')) {
            let tmp = findItem(cart, event.target);
            +(addToCart.textContent)--;
            tmp.amount = tmp.amount -1;
                if (tmp.amount > 0) {
                event.target. nextElementSibling.innerText = tmp.amount;
            } else {
            cart = filterItem(cart, event.target);
            cartItems.removeChild(event.target.parentElement.parentElement.parentElement)
            }
        subtotals();    
        }
         
    })
};

let heartsCount = function (){
let hearts = document.querySelectorAll('.heart-title');
let heartTitles = document.querySelectorAll('.heart-title');

for (let i=0; i<hearts.length; i++) {
    hearts[i].addEventListener ('click', function (){
        if (hearts[i].classList.contains('added-like')) {
            +(likesTotal.textContent)--;
            heartTitles[i].title="Нравится";
        } else {
            +(likesTotal.textContent)++;
            heartTitles[i].title=":-( Больше не нравится";
        }
        hearts[i].classList.toggle('added-like');
        })
    };
};

//open/close sidebar
(function (){ 
    sidebarOpen.addEventListener ('click', function () {
        document.querySelector('.over').classList.add('active');
        sidebar.classList.toggle('show-sidebar');
        subtotals();
        });
    
    closeBtn.addEventListener('click', function (){
        document.querySelector('.over').classList.remove('active');
        sidebar.classList.toggle('show-sidebar');
    });

    //Cтроим каталог
    let result = '';
    products.forEach(function (item){
        result+=createProduct(item);
    })
    document.querySelector('.showcase').innerHTML=result;

    addProductToCart ();
    renderCart();
    heartsCount();
}) ();


    

/*ООП классы JS

class App {
    cart = [];
    cartItems = document.querySelector('.cart-items');
    clearCart = document.querySelector('.clear-cart');
    //магические методы (конструктор)
    constructor() {
        const sidebarToggle = document.querySelector('.sidebar-toggle');
        const sidebar = document.querySelector('.sidebar');
        const closeBtn = document.querySelector('.close-btn')
    }

}
makeShowCase(products) {
    let result = '';
    products.forEach(function (item) {
        result+=createProducnt(item)
    })
}
*/
