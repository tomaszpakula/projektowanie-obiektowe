package com.example.zadaanie9

import io.realm.kotlin.Realm
import io.realm.kotlin.RealmConfiguration
import io.realm.kotlin.ext.query

object DataProvider {
    val realm: Realm by lazy {
        val config = RealmConfiguration.Builder(
            schema = setOf(Product::class, Category::class, CartItem::class)
        ).build()
        val instance = Realm.open(config)
        initializeData(instance)
        instance
    }


    fun initializeData(realm: Realm) {
        val data = realm.query(Product::class).find()
        if(data.isEmpty()){
            val product1 = Product().apply {
                id=1
                categoryId=1
                name="Banan"
                price=15.0
            }

            val product2 = Product().apply {
                id=2
                categoryId=1
                name="Jablko"
                price=2.5
            }


            val product3 = Product().apply {
                id=3
                categoryId=2
                name="Telefon"
                price=2000.0
            }

            val category1 = Category().apply {
                id = 1
                name = "Jedzenie"
            }

            val category2 = Category().apply {
                id = 2
                name = "Technologia"
            }

            realm.writeBlocking {
                copyToRealm(product1)
                copyToRealm(product2)
                copyToRealm(product3)
                copyToRealm(category1)
                copyToRealm(category2)

            }
        }

    }


    fun getAllProducts(): List<Product> = realm.query<Product>().find()

    fun getAllCategories(): List<Category> = realm.query<Category>().find()

    fun getCategoryById(categoryId: Int): String {
        val category = realm.query<Category>("id == $0 ", categoryId).first().find()
        return category?.name ?: "Nieznana"
    }

    fun addProductToCart(productId: Int, quantity: Int) {
        try {
            realm.writeBlocking {
                val item = query<CartItem>("productId == $0", productId).first().find()
                if (item != null) {
                    item.quantity += quantity
                } else {
                    val newId = (query<CartItem>().max("id", Int::class).find() ?: 0) + 1
                    copyToRealm(CartItem().apply {
                        id = newId
                        this.productId = productId
                        this.quantity = quantity
                    })
                }
            }
        }
        catch (e: Exception) {
            println("Błąd przy dodawaniu produktu do koszyka: ${e.message}")

        }

    }

    fun getCartProducts(): List<CartItem> = realm.query<CartItem>().find()

    fun getProductById(id: Int): Product? {
        return realm.query<Product>("id == $0", id).first().find()
    }

    fun clearCart() {
        realm.writeBlocking {
            val items = query<CartItem>().find()
            delete(items)
        }
    }

}
