document.addEventListener('DOMContentLoaded', function(){
    
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
    }
}

/* Ordenar els productes */
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
function orderPriceUPtoDOWN(){
    const parent = document.querySelector('.product-row-grid');
    Array.from(parent.children).sort(function(a, b) {
        return ( Number(b.querySelector('.price').textContent.replace('€','')) - Number(a.querySelector('.price').textContent.replace('€','')) )
    }).forEach(function(ele) {
        parent.appendChild(ele);
    })
}
function orderPriceDOWNtoUP(){
    const parent = document.querySelector('.product-row-grid');
    Array.from(parent.children).sort(function(a, b) {
        return ( Number(a.querySelector('.price').textContent.replace('€','')) - Number(b.querySelector('.price').textContent.replace('€','')) )
    }).forEach(function(ele) {
        parent.appendChild(ele);
    })
}


