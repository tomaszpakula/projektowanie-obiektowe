package com.example.zadaanie9

import io.realm.kotlin.types.RealmObject
import io.realm.kotlin.types.annotations.PrimaryKey

open class CartItem: RealmObject {
    @PrimaryKey
    var id: Int = 0
    var productId: Int = 0
    var quantity: Int = 0
}

