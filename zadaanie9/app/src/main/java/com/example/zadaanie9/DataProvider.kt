package com.example.zadaanie9

object DataProvider {

    val categories = listOf(
        Category(1, "food")
    )

    val products = listOf(
        Product(1, "Jabłko",20.5, 1),
        Product(2, "Gruszka",30.1, 1),
        Product(3, "Banan",15.2, 1),
        Product(4, "Pomarańcza", 16.7, 1),
        Product(5, "Ananas", 20.20, 1)
    )

    var cart = mutableListOf<CartItem>(
        CartItem(1, 1, 5)
    )

    fun getAllProducts(): List<Product> = products

    fun getAllCategories():  List<Category> = categories

    fun getCategoryById(categoryId: Int): String {
        return categories.find { it.id == categoryId }?.name ?: "Nieznana"
    }

    fun addProductToCart(productId: Int, quantity: Int){
        val item: CartItem? = cart.find { it.productId == productId }
        if(item!=null){
            item.quantity += quantity
        }
        else{
            cart.add(CartItem(cart.size, productId, quantity ))
        }
    }

    fun getCartProducts(): List<CartItem> = cart

    fun getProductById(id: Int): Product?{
        return products.find { it.id == id }
    }

}
