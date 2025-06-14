package com.example.zadaanie9

import io.realm.kotlin.types.RealmObject
import io.realm.kotlin.types.annotations.PrimaryKey

open class Category: RealmObject{
    @PrimaryKey var id: Int = 0
    var name: String = ""
}