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

    fun getAllProducts(): List<Product> = products

    fun getAllCategories():  List<Category> = categories

    fun getCategoryById(categoryId: Int): String {
        return categories.find { it.id == categoryId }?.name ?: "Nieznana"
    }

}
