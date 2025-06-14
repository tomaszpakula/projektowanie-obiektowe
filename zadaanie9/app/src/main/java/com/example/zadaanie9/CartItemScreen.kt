package com.example.zadaanie9

import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.width
import androidx.compose.foundation.layout.wrapContentHeight
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.ShoppingCart
import androidx.compose.material3.Button
import androidx.compose.material3.Card
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.mutableIntStateOf
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.text.style.TextAlign
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp

@Composable
fun CartItemScreen(item: CartItem) {
    val product: Product? = DataProvider.getProductById(item.productId)
    val textModifier = Modifier.padding(8.dp)
    if(product == null) return
    Card(modifier = Modifier.padding(bottom = 12.dp).wrapContentHeight()) {
        Column(modifier = Modifier.fillMaxWidth()) {
            Row(
                modifier = Modifier
                    .padding(vertical = 8.dp)
                    .fillMaxWidth(),
                horizontalArrangement = Arrangement.Center
            ) {
                Text(product.name, modifier = textModifier)
                Text("Ilość: " + item.quantity.toString(), modifier=textModifier)
            }

            Row(
                modifier = Modifier
                    .padding(vertical = 8.dp)
                    .fillMaxWidth(),
                horizontalArrangement = Arrangement.Center
            ) {

                Text("Cena: " +  product.price.toString() + " zł", modifier = textModifier)
                Text("Razem: " + (product.price * item.quantity).toString() + "zł", modifier = textModifier )
            }



        }
    }


}

/*@Preview(showBackground = true)
@Composable
fun ShowCartItemScreen() {
    val sampleItem: CartItem = CartItem(1,1,5)
    CartItemScreen(sampleItem)
}*/

