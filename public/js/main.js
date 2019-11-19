var cart = [];

var Product = function(nombre,precio){
	this.nombre = nombre;
	this.precio = precio;
	this.cantidad = 1;
};


function addItem(nombre,precio){
	for(i in cart)
	{
		if(cart[i].nombre == nombre)
		{
			cart[i].cantidad++;
			return;
		}
	}
	var item = new Product(nombre,precio);
			cart.push(item);
			saveCart();
}

function removerItem(nombre){
	for (i in cart)
	{
		if(cart[i].nombre == nombre)
		{
			cart[i].cantidad--;
			if(cart[i].cantidad === 0)
			{
				cart.splice(i,1);
			}
			break;
		}
	}
	saveCart();
}


function removerTodosLosItems(nombre){
	for(var i in cart)
	{
		if(cart[i].nombre == nombre)
		{
			cart.splice(i,1);
			break;
		}
	}
	saveCart();
}

function contarCarrito() {
	var contador = 0;
	for(i in cart){
		contador+=cart[i].cantidad;
	}
	return contador;
}

function totalCarrito(){
	var total=0;
	for(var i in cart){
		total= (cart[i].cantidad  * cart[i].precio) + total;
	}
	return total;
}

function limpiarCarrito(){
	cart = [];
}

function cartList(){
	var cartCopy = [];
	for(var i in cart)
	{
		var item = cart[i];
		var itemCopy = {};
		for(var j in item)
		{
			itemCopy[j] = item[j];
		}
		cartCopy.push(itemCopy);
	}
	return cartCopy;
}
function saveCart(){
	localStorage.setItem("carritoDeCompra",JSON.stringify(cart));
}
function loadCart(){
    cart = JSON.parse(localStorage.getItem("carritoDeCompra"));
}