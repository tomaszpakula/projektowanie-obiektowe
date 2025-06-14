package com.example.zadaanie9

import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.size
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.items
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.ShoppingCart
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import androidx.navigation.NavController

@Preview(showBackground = true)
@Composable
fun CartScreen(navController: NavController? = null) {
    val cartItems: List<CartItem> = DataProvider.getCartProducts()
    val products: List<Product> = DataProvider.getAllProducts()
    val productMap = products.associateBy { it.id }

    val totalPrice = cartItems.sumOf { item ->
        val product = productMap[item.productId]
        (product?.price ?: 0.0) * item.quantity
    }

    Column(modifier= Modifier.fillMaxWidth().padding(30.dp), horizontalAlignment = Alignment.CenterHorizontally){
        Row(
            modifier = Modifier.fillMaxWidth(),
            horizontalArrangement = Arrangement.Start
        ) {
            IconButton(onClick = { navController?.navigate("products") }) {
                Icon(Icons.Default.ShoppingCart, contentDescription = "Przejdź do produktów", modifier = Modifier.size(50.dp))
            }
        }
        Text("Cart", modifier = Modifier.padding(10.dp), fontSize = 30.sp)
        LazyColumn(modifier = Modifier.weight(1f).fillMaxWidth(), horizontalAlignment = Alignment.CenterHorizontally ){
            items(cartItems) { item ->
                CartItemScreen(item)

            }
            item {
                Text("Razem: $totalPrice zł")
            }

        }

    }

}

