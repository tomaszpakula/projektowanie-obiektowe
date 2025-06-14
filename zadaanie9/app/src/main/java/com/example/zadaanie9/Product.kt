package com.example.zadaanie9

import io.realm.kotlin.types.RealmObject
import io.realm.kotlin.types.annotations.PrimaryKey

open class Product: RealmObject {
    @PrimaryKey
    var id: Int = 0
    var name: String = ""
    var price: Double = 0.0
    var categoryId: Int = 0
}