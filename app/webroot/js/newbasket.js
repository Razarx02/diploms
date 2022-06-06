let  newProductObject = {
    id: 0,
    title: "title",
    price: 100,
    code: 'default',
    category: "category",
    podcategory: "podcategory",
    counter: 0, 
    allprice: 0,
    img: "img",
    brend: "brend",
    check: 'active'
}

let URL = window.location.hostname + "/products/apiview/";


const btn_products = document.querySelectorAll(".btn--productsa")

const btn_products_minus = document.querySelectorAll(".cards--minusa")


	
if(btn_products[0] != undefined) {
	for(let item of btn_products) {
		item.onclick = catalog_btn
		if(chechHaspp(item.getAttribute('data-id'))){
			item.parentElement.classList.add("active");	
			item.innerHTML = `<span class="value--span"> ${getCounterAe(item.getAttribute('data-id'))} </span>`
		}
	}
	for(let item of btn_products_minus) {
		item.onclick = catalog_btn_minus 
	}
} 

function getCounterAe(id) {
	arrayProducts = []
    crowedArray()
    for (let item of  arrayProducts) {
    	if (item.id == id ) {
    		return item.counter
    	}
    }
}

function chechHaspp(id) {
	arrayProducts = []
    crowedArray()
    for (let item of  arrayProducts) {
    	if (parseInt(item.id) ==  parseInt(id) ) {
    		return true
    	}
    }

    return false
}
// console.log(btn_products[0])
function catalog_btn(){
	arrayProducts = []
    crowedArray()
    let checkBool = false
    let id = parseInt(this.getAttribute('data-id'))

 
    for(let item of arrayProducts) {
    	if(item.id == id) {
    		checkBool = true
    	} 
    }


    if(checkBool == false) {
		let product_object = ProductObject;
	// https://test.ipro.su/products/index
		let new_item = ProductObject		
		new_item.id = parseInt(this.getAttribute('data-id'))
	    new_item.title = this.getAttribute('data-title')
	    new_item.price = parseInt(this.getAttribute('data-price'))
	    new_item.img = this.getAttribute('data-img')
	    new_item.category = this.getAttribute('data-category')
	    new_item.code = this.getAttribute('data-code')
	    new_item.brend = this.getAttribute('data-brand')
	    new_item.check = 'active' 
	    new_item.counter = 1
	    new_item.allprice = new_item.counter * new_item.price
		new_item.allcounter = 1

		productadd( new_item ) 
	  
	    let allcounter = sizeProducts()
	    writeCounter(allcounter)
	    writeAllPrice()
	    this.parentElement.classList.add("active");
	    this.innerHTML = `<span class="value--span"> 1 </span>`
    } else {
    	// alert("ok")
    	for(let item of arrayProducts) {
	    	if(item.id == id) {
	    	 		item.counter = item.counter + 1
	    	 		item.allprice = item.counter * item.price;
            } 
	    }

	   

        localStorage.setItem("product", JSON.stringify(arrayProducts))
	    let allcounter = sizeProducts()
	    writeCounter(allcounter)
	    writeAllPrice()
	    this.innerHTML = `<span class="value--span"> ${getCounterAe(id)} </span>`
    }

}

function catalog_btn_minus() {
	// alert("ok")
	arrayProducts = []
    crowedArray()
    let id = parseInt(this.getAttribute('data-id'))
    let nolCheck =  false
    // alert(id)
	for(let item of arrayProducts) {
	    	if(item.id == id) {
    	 		if(item.counter > 1)  {
    	 			 	nolCheck =  true
    	 				item.counter = item.counter - 1	
    	 		}

    	 		if(nolCheck == false) {
    	 			 for(let item in arrayProducts) {
				        if(parseInt(arrayProducts[item].id) == parseInt(id)) {
				            if (item > -1) {
				                arrayProducts.splice(item, 1);
				                localStorage.setItem("product", JSON.stringify(arrayProducts))
				            
				            }
				            
				        }
    				}

    			this.parentElement.classList.remove("active");
    	 			 // let as = deleteInStorage(id)
    	 			
    	 			 for(let item of btn_products) {
				
						if(item.getAttribute('data-id') == id ){
							// item.parentElement.classList.add("active");	

							item.innerHTML = " "
						} 
					}
          		}
    	 	
    	 		item.allprice = item.counter * item.price;
            } 
    }
   	localStorage.setItem("product", JSON.stringify(arrayProducts))
    let allcounter = sizeProducts()
    writeCounter(allcounter)
    writeAllPrice()
    for(let item of btn_products) {
		item.onclick = catalog_btn
		if(chechHaspp(item.getAttribute('data-id'))){
			item.parentElement.classList.add("active");	
			item.innerHTML = `<span class="value--span"> ${getCounterAe(item.getAttribute('data-id'))} </span>`
		}
	}

}




