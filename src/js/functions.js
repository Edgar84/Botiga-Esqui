/* Variables globals */
let productsInCart = []; // Creem un array buit per afegir els pruductes del carret
document.addEventListener('DOMContentLoaded', function(){
    notHasProductsInCart();
});


listeners();
function listeners() {
    /* Omplir la modal amb les dades del producte */
    document.querySelectorAll('.product-grid3 .show-product').forEach(function(product){
        product.addEventListener('click', function(){
            showProduct(product);
        });
    });
    /* Cridar a ordenar els productes */
    if(document.querySelector('#order_by')){
        let orderBy = document.querySelector('#order_by');
        document.querySelector('#order_by').addEventListener('change', function(){
            if(orderBy.value == 'a-z'){
                orderAZ();
            }else if(orderBy.value == 'z-a'){
                orderZA();
            }else if(orderBy.value == 'mes-preu'){
                orderPriceUPtoDOWN();
            }else if(orderBy.value == 'menys-preu'){
                orderPriceDOWNtoUP();
            }
        });
    }
    /* Cridar per mostrar barra lateral */
    if(document.querySelector('.filterBtn')){
        document.querySelector('.filterBtn').addEventListener('click', showFilters);
        /* Cridar per ocultar barra lateral */
        document.querySelector('.dark').addEventListener('click', hideFilters);
        window.addEventListener('resize', hideFiltersResize);
    }
    /* Cridar per extrere la info de cada producte */
     document.querySelector('.product-row-grid').addEventListener('click', readData);
     /* Crida per budiar el carret */
    document.querySelector('.clear-cart').addEventListener('click', emptyCart);
    /* Crida per eliminar un producte del carret */
    document.querySelector('.submenu .menu-cart-list').addEventListener('click', deleteProduct);
   
    
} 

/* Omplir la modal amb les dades del producte clicat */
function showProduct(elem){
    const modal = document.querySelector('.modal-body');
    const productInfo = elem.closest('.product-grid3');

    if(modal){
        modal.querySelector('.modal-product_img').src = productInfo.querySelector('.pic-1').src;
        modal.querySelector('.modal-product_title').innerText = productInfo.querySelector('.title').innerText;
        modal.querySelector('.modal-product_description').innerText = productInfo.querySelector('.description').innerText;
        modal.querySelector('.modal-product_price').innerText = productInfo.querySelector('.price').innerText;
        if(productInfo.querySelector('.brand').innerText.length > 0){
            modal.querySelector('.modal-product_brand-title').innerHTML = `<span>Marca:</span>`;
            modal.querySelector('.modal-product_brand').innerHTML = productInfo.querySelector('.brand').innerText;
        }
        if(productInfo.querySelector('.size').innerText.length > 0){
            modal.querySelector('.modal-product_model-title').innerHTML = `<span>Model:</span>`;
            modal.querySelector('.modal-product_model').innerHTML = productInfo.querySelector('.model').innerText;
        }
        if(productInfo.querySelector('.size').innerText.length > 0){
            modal.querySelector('.modal-product_size-title').innerHTML = `<span>Talla:</span>`;
            modal.querySelector('.modal-product_size').innerHTML = productInfo.querySelector('.size').innerText;
        }
    }
}

/* Ordenar els productes de la A a la Z*/
function orderAZ(){
    const parent = document.querySelector('.product-row-grid');
    Array.from(parent.children).sort(function(a, b) {
        if (a.querySelector('.title').textContent < b.querySelector('.title').textContent){
            return -1;
        }else if (a.querySelector('.title').textContent == b.querySelector('.title').textContent){
            return 0;
        }else {
            return 1;
        }
    }).forEach(function(ele) {
        parent.appendChild(ele);
    })
}
/* Ordenar els productes de la Z a la A*/
function orderZA(){
    const parent = document.querySelector('.product-row-grid');
    Array.from(parent.children).sort(function(a, b) {
        if (a.querySelector('.title').textContent > b.querySelector('.title').textContent){
            return -1;
        }else if (a.querySelector('.title').textContent == b.querySelector('.title').textContent){
            return 0;
        }else {
            return 1;
        }
    }).forEach(function(ele) {
        parent.appendChild(ele);
    })
}
/* Ordenar els productes de més car a més barat*/
function orderPriceUPtoDOWN(){
    const parent = document.querySelector('.product-row-grid');
    Array.from(parent.children).sort(function(a, b) {
        return ( Number(b.querySelector('.price').textContent.replace('€','')) - Number(a.querySelector('.price').textContent.replace('€','')) )
    }).forEach(function(ele) {
        parent.appendChild(ele);
    })
}
/* Ordenar els productes de la més barat a més car*/
function orderPriceDOWNtoUP(){
    const parent = document.querySelector('.product-row-grid');
    Array.from(parent.children).sort(function(a, b) {
        return ( Number(a.querySelector('.price').textContent.replace('€','')) - Number(b.querySelector('.price').textContent.replace('€','')) )
    }).forEach(function(ele) {
        parent.appendChild(ele);
    })
}

/* Mostrar barra lateral per filtres a la vista móbil */
function showFilters(){
    document.querySelector('aside').style.left = "0";
    document.querySelector('.dark').classList.remove('d-none');
    document.querySelector('body').style.overflowY = "hidden";
}

/* Amagar barra lateral per filtres a la vista móbil */
function hideFilters(){
    document.querySelector('aside').style.left = "-300px";
    document.querySelector('.dark').classList.add('d-none');
    document.querySelector('body').removeAttribute("style");
}

/* Amagar barra lateral per filtres si redimensionen la finestra del navegador */
function hideFiltersResize(){
    if(!document.querySelector('.dark').classList.contains('d-none') && window.innerWidth >= 768){
        hideFilters();
    }
}

/* Crear objectes de cada producte al que es faci click*/
function readData(e){
    e.preventDefault();
    
    if(e.target.classList.contains('add-to-cart') || e.target.classList.contains('fa-shopping-cart')){
        const product = e.target.closest('.product-grid3');
        const infoProduct = {
            imatge: product.querySelector('.pic-1').src,
            nom: product.querySelector('.title').textContent,
            descripcio: product.querySelector('.description').textContent,
            marca: product.querySelector('.brand').textContent,
            model: product.querySelector('.model').textContent,
            talla: product.querySelector('.size').textContent,
            preu: product.querySelector('.price').textContent,
            id: product.querySelector('.title').getAttribute('data-id')
        }
        /* Afegim el/els productes seleccionats dins d'un array */
        productsInCart.push(infoProduct);

        addToCart(productsInCart);
    }
}

function addToCart(productsInCart){
    let ul = document.querySelector('.nav-item-cart-block .submenu .menu-cart-list');

    if(ul.hasChildNodes()){
        emptyCart();
    }
    
    productsInCart.forEach( product =>{
        const item = `
        <li class="cart-item">
            <div class="row">
                <div class="col-3"><img class="cart-item_image" src="${product.imatge}"></div>
                <div class="col-5"><span class="cart-item_name" data-id="${product.id}">${product.nom}</span></div>
                <div class="col-4"><span class="cart-item_price">${product.preu}</span></div>
            </div>
            <div class="remove">
                <i class="fas fa-backspace" data-id="${product.id}"></i>
            </div>
        </li>`;
        ul.innerHTML += item;
    });

    hasProductsInCart();
}

/* Buidar el carret de tots els productes */
function emptyCart(){
    document.querySelector('.nav-item-cart-block .submenu .menu-cart-list').innerHTML = "";
    notHasProductsInCart()
}

/* Canviar el text si no hi ha productes al carret */
function notHasProductsInCart(){
    let ul = document.querySelector('.nav-item-cart-block .submenu .menu-cart-list');
    if(ul.firstElementChild == null){
        ul.parentElement.querySelector('.clear-cart').textContent = "Carret buit";
        ul.parentElement.querySelector('.clear-cart').style = "pointer-events:none;";
    }else{
        hasProductsInCart();
    }
}

/* Canviar el text si hi ha productes al carret */
function hasProductsInCart(){
    let ul = document.querySelector('.nav-item-cart-block .submenu .menu-cart-list');
    if(ul.firstElementChild != null){
        ul.parentElement.querySelector('.clear-cart').textContent = "Buidar carret";
        ul.parentElement.querySelector('.clear-cart').style = "pointer-events:all;";
    }else{
        notHasProductsInCart();
    }
}

/* Eliminar un producte */
function deleteProduct(e){
    let item = e.target.closest('.cart-item');

    if(e.target.classList.contains('fa-backspace')){
        productsInCart = productsInCart.filter( product => product.id !== e.target.getAttribute('data-id'));
        addToCart(productsInCart);

        /*
        if(document.querySelector('.nav-item-cart-block .submenu .menu-cart-list').childElementCount == 1){
            for (var i = 0; i < productsInCart.length; i++) {
                if (productsInCart[i].id === e.target.getAttribute('data-id')) {
                    productsInCart = productsInCart.splice(i, 1);
                }
            }
            item.remove();
            notHasProductsInCart();
        }else{
            console.log("target: " + e.target.getAttribute('data-id'));
            for (var i = 0; i < productsInCart.length; i++) {
                if (productsInCart[i].id === e.target.getAttribute('data-id')) {
                    productsInCart = productsInCart.splice(i, 1);
                }
            }
            item.remove();
            
        }
        */
    }
}

