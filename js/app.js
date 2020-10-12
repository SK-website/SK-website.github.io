"use strict"

class App {
    cart = [];
    cartItems = document.querySelector('.cart-items');
    clearCart = document.querySelector('.clear-cart');

    //магические методы (конструктор)
    constructor() {
        const sidebar = document.querySelector('.sidebar');
        const sidebarOpen = document.querySelector('.fa-shopping-basket');
        const closeBtn = document.querySelector('.close-btn');
        
        //open/close sidebar
        sidebarOpen.addEventListener ('click', () => {
            document.querySelector('.over').classList.add('active');
            sidebar.classList.toggle('show-sidebar');
            this.subtotals();
            console.log(this);
        });
    
        closeBtn.addEventListener('click', () => {
            document.querySelector('.over').classList.remove('active');
            sidebar.classList.toggle('show-sidebar');
            }); 
          
        this.makeShowcase(products);
    };

    //Cтроим каталог
    makeShowcase(products){ 
        let result = '';
    
        products.forEach(item => result+=this.createProduct(item));
        document.querySelector('.showcase').innerHTML=result;
    };

    getProduct(id){
        return products.find(product => product.id===+(id));
    };



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
                    <p class="product-price small text-muted">${data.price}</p>
                    <p class="author small text-muted">${data.author}</p>
                </section>
            </div>
        </div>
        `
    };

    //Субтотал
    subtotals(){
        let itemsInCart = document.querySelectorAll('.cart-item');
            for (let item of itemsInCart){
                let price = item.querySelector('.product-price').textContent;
                let amount = item.querySelector('.amount').textContent;
                item.querySelector('.product-subtotal').textContent = price*amount;
            }
    };

    //Добавление товарав в корзину через шаблонные строки
    createCartItem(item) {
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
    this.cartItems.append(div);
    };

    //Добавление товара в корзину
    addProductToCart() {
        const addToCart = document.querySelector('.to-cart');
        const addToCartButtons = [...document.querySelectorAll('.btn-cart')];
            addToCartButtons.forEach(button => {
            button.addEventListener('click', event =>{
                console.log(event.target.closest('.card').getAttribute('data-id'));
                console.log(this);
                let cartItem = {...this.getProduct(event.target.closest('.card').getAttribute('data-id')), amount: 1}
                console.log(cartItem);
                this.cart = [...this.cart, cartItem];
                this.createCartItem(cartItem);
                +(addToCart.textContent)++;
                console.log(button.title);
                button.setAttribute('disabled', 'disabled');
                button.title="Уже в корзине";
                //console.log(button.title);
                //button.classList.add('added');
                          
                this.subtotals()
            })
        })
    };
    clearAll(){
        const addToCart = document.querySelector('.to-cart');
        this.cart = [];
        while(this.cartItems.children.length>0){
            this.cartItems.removeChild(this.cartItems.children[0]);
            addToCart.textContent='0';
        } 
        this.subtotals();
        let btnCarts=document.querySelectorAll('.btn-cart');
        for(let btnCart of btnCarts) {
            btnCart.classList.remove('added');
        }
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
        const addToCart = document.querySelector('.to-cart');
        this.clearCart.addEventListener('click', () => this.clearAll());
        this.cartItems.addEventListener('click', event => {
                    
            if(event.target.classList.contains('fa-trash-alt')) {
                console.log(event.target);
                let itemAmount = this.findItem(this.cart, event.target);
                addToCart.textContent = +addToCart.textContent - itemAmount.amount;
                let btnCartId = event.target.getAttribute('data-id');
                console.log(btnCartId);
                this.btnRemoveAttribute(btnCartId);
                this.cart = this.filterItem(this.cart, event.target);
                this.cartItems.removeChild(event.target.parentElement.parentElement.parentElement);
                         
                } else if (event.target.classList.contains('fa-caret-right')) {
                    console.log(event.target);
                    let tmp = this.findItem(this.cart, event.target);
                    console.log(tmp);
                    tmp.amount = tmp.amount + 1;
                    console.log(tmp.amount);
                    +(addToCart.textContent)++;
                    event.target.previousElementSibling.innerText = tmp.amount;
                    this.subtotals();
                } else if (event.target.classList.contains('fa-caret-left')) {
                    let tmp = this.findItem(this.cart, event.target);
                    +(addToCart.textContent)--;
                    tmp.amount = tmp.amount -1;
                        if (tmp.amount > 0) {
                        event.target. nextElementSibling.innerText = tmp.amount;
                        } else {
                            let btnCartId = event.target.getAttribute('data-id');
                            this.btnRemoveAttribute(btnCartId);
                            this.cart = this.filterItem(this.cart, event.target);
                            this.cartItems.removeChild(event.target.parentElement.parentElement.parentElement);
                            };
                    this.subtotals();    
                    }
                     
        });
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
        };
        
    
};

(function (){ 
    const app = new App();

    app.addProductToCart ();
    app.renderCart();
    app.heartsCount();
   
})();

//ООП классы JS
/*class Product{
    getProducts(){
        return products.map(item=>{
            const name = item.name;
            const price = item.price;
            const id = item.id;
            const image = item.image;
            return {id,name,price,image};
        });
    }
};


makeShowcase(products){
    let result = '';
    products.forEach(function (item) {
        result+=createProducnt(item);
    });
}

let data = new Product();
Storage.saveProducts(data.getPRoducts(products));
this.makeShowcase(Storage.getProducts());*/

