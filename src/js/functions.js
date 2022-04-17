/* Variables globals */
let productsInCart = []; // Creem un array buit per afegir els pruductes del carret

listeners();
function listeners() {
    document.addEventListener('DOMContentLoaded', function(){
        notHasProductsInCart();
        /* Carregar carret del localStorage */
        productsInCart = JSON.parse(localStorage.getItem('carrito')) || [];
        addToCart(productsInCart);
    });
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
    document.querySelector('.clear-cart').addEventListener('click', function(){
        productsInCart = [];
        emptyCart();
    });
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
    console.log(e.target.closest('.product-grid3').querySelector('.product-new-label').innerText);
    if( (e.target.classList.contains('add-to-cart') || e.target.classList.contains('fa-shopping-cart')) && e.target.closest('.product-grid3').querySelector('.product-new-label').innerText != "0u." ){
        const product = e.target.closest('.product-grid3');
        const infoProduct = {
            imatge: product.querySelector('.pic-1').src,
            nom: product.querySelector('.title').textContent,
            descripcio: product.querySelector('.description').textContent,
            marca: product.querySelector('.brand').textContent,
            model: product.querySelector('.model').textContent,
            talla: product.querySelector('.size').textContent,
            preuBase: product.querySelector('.price').textContent,
            preu: product.querySelector('.price').textContent,
            id: product.querySelector('.title').getAttribute('data-id'),
            quantitat: 1
        }
        /* Revisar si un producte ja existeix al carret */
        const exist = productsInCart.some( product => product.id === infoProduct.id);
        if(exist){
            /* Actualitzem la quantitat i el preu del producte */
            const products = productsInCart.map( product =>{
                if(product.id === infoProduct.id){
                    product.quantitat++;
                    const priceBase = Number(product.preuBase.replace("€","")).toFixed(2);
                    product.preu = (priceBase * Number(product.quantitat)).toFixed(2).toString() + "€";
                    return product;     // <-- Retornem el producte amb les dades actualitzades
                }else {
                    return product;     // <-- Retornem els productes que no están duplicats
                }
            });
            productsInCart = [...products];
        }else{
            /* Afegim el/els productes seleccionats dins d'un array */
            productsInCart = [...productsInCart,infoProduct];   // Afegir productes mab Spread Operator
            //productsInCart.push(infoProduct);                   // Afegir productes amb push
        }

        addToCart(productsInCart);
        substractUnits(product);
    }
}

function addToCart(productsInCart){
    let ul = document.querySelector('.nav-item-cart-block .submenu .menu-cart-list');

    if(ul.hasChildNodes()){
        emptyCart();
    }
    
    productsInCart.forEach( (product, index) =>{

        const item = `
        <li class="cart-item">
            <div class="row">
                <div class="col-3"><img class="cart-item_image" src="${product.imatge}"></div>
                <span class="cart-item_quantity">${product.quantitat}</span>
                <div class="col-5"><span class="cart-item_name" data-id="${product.id}">${product.nom}</span></div>
                <div class="col-4"><span class="cart-item_price">${product.preu}</span></div>
            </div>
            <div class="remove">
                <i class="fas fa-backspace" data-index="${index}" data-id="${product.id}"></i>
            </div>
        </li>`;
        ul.innerHTML += item;
    });

    /* Guardar productes al localStorage */
    addToLocalStorage();

    /* Canviar el text si hi ha productes al carret */
    hasProductsInCart();
}

/* Buidar el carret de tots els productes */
function emptyCart(){
    document.querySelector('.nav-item-cart-block .submenu .menu-cart-list').innerHTML = "";
    notHasProductsInCart();
    /* Buidar també el localStorage */
    localStorage.clear();
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
        const productId = e.target.getAttribute('data-id');

        /* Si només te 1 d'aquest producte, actualitzem l'array i l'imprimim al carret */
        if(Number(item.querySelector('.cart-item_quantity').innerText) === 1) {
            productsInCart = productsInCart.filter( product => product.id !== productId );
            addToCart(productsInCart);
        }else{
            /* Si te més de 1 d'aquest producte actualitzem la quantitat i el preu del producte */
            const products = productsInCart.map( product =>{
                if(product.id === productId){
                    product.quantitat--;
                    const priceBase = Number(product.preuBase.replace("€","")).toFixed(2);
                    product.preu = (Number(product.preu.replace("€","")).toFixed(2) - priceBase).toFixed(2).toString() + "€";
                    return product;     // <-- Retornem el producte amb les dades actualitzades
                }else {
                    return product;     // <-- Retornem els productes que no están duplicats
                }
            });
            productsInCart = [...products];
            addToCart(productsInCart);
        }

        /* Tornem a sumar una unitat als productes de la botiga quan esborrem un producte del carret */
        let products = document.querySelectorAll('.product-row-grid .title');
        products.forEach(product => {
            if(product.getAttribute('data-id') === productId){
                let productInGrid = product.closest('.product-grid3');
                addUnits(productInGrid);
            }
        });
    }
}

/* Restar un a les unitats del producte */
function substractUnits(product){
    let units = Number(product.querySelector('.product-new-label').innerText.replace("u.",""));
    if(units > 0){
        units--;
        product.querySelector('.product-new-label').innerText = units.toString() + "u.";
        if(product.querySelector('.add-to-cart').hasAttribute('style')){
            product.querySelector('.add-to-cart').removeAttribute('style');
        }
    }
    if(product.querySelector('.product-new-label').innerText === "0u.") {
        product.querySelector('.add-to-cart').style = "pointer-events:none;";
        product.querySelector('.add-to-cart').style = "cursor:no-drop;";
        product.querySelector('.add-to-cart .fa-shopping-cart').style = "pointer-events:none;";
    }
}

/* Sumar un a les unitats del producte */
function addUnits(product){
    let units = Number(product.querySelector('.product-new-label').innerText.replace("u.",""));
    units++;
    product.querySelector('.product-new-label').innerText = units.toString() + "u.";
    if(product.querySelector('.add-to-cart').hasAttribute('style')){
        product.querySelector('.add-to-cart').removeAttribute('style');
    }
}

/* Guardar el carret al localStorage */
function addToLocalStorage(){
    localStorage.setItem('carrito', JSON.stringify(productsInCart));
}
