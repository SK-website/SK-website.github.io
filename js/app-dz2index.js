"use strict"

class Storage {
    static saveProducts(products){
       localStorage.setItem('products', JSON.stringify(products));
    } 

    static saveCart(cart){
        localStorage.setItem('basket', JSON.stringify(cart));
    }

    //методы, которые читают из LS

    static getProduct(id){
        let products = JSON.parse(localStorage.getItem('products'));
        return products.find(product=>product.id===+(id));
    }

    static getProducts(){
        return JSON.parse(localStorage.getItem('products'));
    }
    
    static getCart(cart){
        return localStorage.getItem("basket")?JSON.parse(localStorage.getItem("basket")): [];
    } 
 
}
class Product {
    getProducts(products){
    return products.map(item =>{
        const name = item.name;
        const price = item.price;
        const id = item.id;
        const image = item.image;
        const author = item.author;
        return {id, name, price, image, author};
        });
    }
}

 
class App {
    cart = [];
    cartItems = document.querySelector('.cart-items');
    clearCart = document.querySelector('.clear-cart');
    sidebar = document.querySelector('.sidebar');
    cartTotal = document.querySelector('.cart-total');  
    addToCart = document.querySelector('.to-cart');

    //магические методы (конструктор)
    constructor() {
        
        const sidebarOpen = document.querySelector('.fa-shopping-basket');
        const closeBtn = document.querySelector('.close-btn');
        
        //open/close sidebar
        sidebarOpen.addEventListener('click', () => this.openCart());
        closeBtn.addEventListener('click', () => this.closeCart());

        if(document.querySelector('.categories-collections')) {
            this.makeCategories(categories);
            let t = document.querySelectorAll('.img-fluid-1')
            console.log(t);
        }
        
        
        let data = new Product();
        Storage.saveProducts(data.getProducts(products));
        this.makeShowcase(Storage.getProducts());
        this.cart = Storage.getCart();
        console.log(this.cart);
    };

    getProduct(id){
        return products.find(product => product.id===+(id));
    };

    //Cтроим каталог
    makeShowcase(products){ 
        let result = '';
        products.forEach(item => result+=this.createProduct(item));
        document.querySelector('.showcase').innerHTML=result;
    };
    openCart(){
        document.querySelector('.over').classList.add('active');
        this.sidebar.classList.toggle('show-sidebar');
        this.cartItems.innerHTML='';
        this.cart = Storage.getCart();
        this.populateCart(this.cart);
        this.setCartTotal(this.cart);
    }
    closeCart() {
        document.querySelector('.over').classList.remove('active');
        this.sidebar.classList.toggle('show-sidebar');
    }
    //Шаблонные строки (для создания карточки товара) обратные кавычки ``
    createProduct(data) {
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
                    <p class="product-price small text-muted">$${data.price}</p>
                    <p class="author small text-muted">${data.author}</p>
                </section>
            </div>
        </div>
        `
    };
    populateCart(cart){
        cart.forEach(item => this.createCartItem(item));
    }

    //Добавление товарав в корзину через шаблонные строки
    createCartItem(item) {
    const div = document.createElement('div');
    div.className = "cart-item";
    div.setAttribute("id", 'id'+item.id);
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
    this.cartItems.append(div);
    };

    //Добавление товара в корзину
    addProductToCart() {
       
        const addToCartButtons = [...document.querySelectorAll('.btn-cart')];
            addToCartButtons.forEach(button => {
            button.addEventListener('click', event =>{
                console.log(event.target.closest('.card').getAttribute('data-id'));
                console.log(this);
                let cartItem = {...this.getProduct(event.target.closest('.card').getAttribute('data-id')), amount: 1}
                console.log(cartItem);
                this.cart = [...this.cart, cartItem];
                +(this.addToCart.textContent)++;
                console.log(button.title);
                button.setAttribute('disabled', 'disabled');
                button.title="Уже в корзине";
                Storage.saveCart(this.cart);
            })
        })
    };
    clearAll(){
        this.cart = []; 
        while(this.cartItems.children.length>0){
            this.cartItems.removeChild(this.cartItems.children[0]);
            this.addToCart.textContent='0';
        } 
        //TODO удаление блокировки кнопки "в корзину"
        this.setCartTotal (this.cart); 
        Storage.saveCart(this.cart);
                
    };

    filterItem = (cart, filteredItem) => cart.filter(item => item.id != 
        +(filteredItem.dataset.id));
       
    findItem = (cart, findingItem) => cart.find(item => item.id === 
        +(findingItem.dataset.id));

    btnRemoveAttribute(btnCartId) {
        let btns = document.querySelectorAll('.btn-cart');
            for (let btn of btns) {
                if (+btn.dataset.id == btnCartId) {
                    btn.removeAttribute('disabled', 'disabled');
                    btn.title="В корзину";
                } 
            }
    };
           
    renderCart() {
        //очистка всей корзины
        this.clearCart.addEventListener('click', () => this.clearAll());

        this.cartItems.addEventListener('click', event => {
            if(event.target.classList.contains('fa-trash-alt')) {
                console.log(event.target);
                let itemAmount = this.findItem(this.cart, event.target);
                this.addToCart.textContent = +this.addToCart.textContent - itemAmount.amount;
                let btnCartId = event.target.getAttribute('data-id');
                console.log(btnCartId);
                this.btnRemoveAttribute(btnCartId);
                this.cart = this.filterItem(this.cart, event.target);
                this.cartItems.removeChild(event.target.parentElement.parentElement.parentElement);
                Storage.saveCart(this.cart);
                this.setCartTotal (this.cart); 
                console.log(this.cartTotal.textContent); 
                console.log(this);  
                } else if (event.target.classList.contains('fa-caret-right')) {
                    console.log(event.target);
                    let tmp = this.findItem(this.cart, event.target);
                    console.log(tmp);
                    tmp.amount = tmp.amount + 1;
                    console.log(tmp.amount);
                    +(this.addToCart.textContent)++;
                    event.target.previousElementSibling.innerText = tmp.amount;
                    Storage.saveCart(this.cart);
                    this.setCartTotal (this.cart);
                    console.log(this);
                    console.log(this.cartTotal.textContent);
                    
                } else if (event.target.classList.contains('fa-caret-left')){
                    let tmp = this.findItem(this.cart, event.target);
                    +(this.addToCart.textContent)--;
                    tmp.amount = tmp.amount -1;
                    Storage.saveCart(this.cart);
                        if (tmp.amount > 0) {
                        event.target. nextElementSibling.innerText = tmp.amount;
                        } else {
                            let btnCartId = event.target.getAttribute('data-id');
                            this.btnRemoveAttribute(btnCartId);
                            this.cart = this.filterItem(this.cart, event.target);
                            this.cartItems.removeChild(event.target.parentElement.parentElement.parentElement);
                            };
                    this.setCartTotal (this.cart);
                    Storage.saveCart(this.cart);
                }
        });
    };
//Total and Subtotal
    setCartTotal(cart) {
        /*let itemsInCart = document.querySelectorAll('.cart-item');
        for (let item of itemsInCart){
            let price = item.querySelector('.product-price').textContent;
            let amount = item.querySelector('.amount').textContent;
            item.querySelector('.product-subtotal').textContent = '('+price*amount+')';
        }*/
        let tmpTotal = '0';
        console.log(this);
        this.cart.map(item=>{
            tmpTotal = item.price*item.amount;
            this.cartItems.querySelector(`#id${item.id} .product-subtotal`).textContent = 
            parseFloat(tmpTotal.toFixed(2));

        });
       
        this.cartTotal.textContent = parseFloat(this.cart.reduce((previous, current) => 
        previous + current.price*current.amount, 0).toFixed(2));
        this.addToCart.textContent = this.cart.reduce((previous, current) =>previous+current.amount,0);
    };


    heartsCount = function (){
        const likesTotal = document.querySelector('.like-me');    
        let hearts = document.querySelectorAll('.heart-title');
        let heartTitles = document.querySelectorAll('.heart-title');
        
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
            });
        };
    }

    createCategory(category){
    return`
    <a href="#" class="category-item" data-category=${category.name}>
    <img src="${category.image}" alt="Фото товара" class="img-fluid-1">
    <strong class="category-item-title" data-category=${category.name}>${category.name}</strong>
    </a>`;
}
    makeCategories(categories){
        for (let i=0; i<3; i++){
        let div = document.createElement('div');
        div.className = "col-md-4";
        div.innerHTML=this.createCategory(categories[i]);
        document.querySelector('.categories-collections').append(div);


        }
    }
}

(function(){
const app = new App();

app.addProductToCart();
app.renderCart();
app.heartsCount();
})();
