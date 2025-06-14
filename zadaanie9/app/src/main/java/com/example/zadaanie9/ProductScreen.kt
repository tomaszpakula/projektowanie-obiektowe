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
fun ProductScreen(product: Product) {
    val count = remember { mutableIntStateOf(0) }
    Card(modifier = Modifier.padding(bottom = 12.dp).wrapContentHeight()) {
        Column(modifier = Modifier.width(250.dp)) {
            Row(
                modifier = Modifier
                    .padding(vertical = 8.dp)
                    .fillMaxWidth(),
                horizontalArrangement = Arrangement.Center
            ) {
                Text(product.name, modifier = Modifier.padding(8.dp))
                Text(product.price.toString() + " zł", Modifier.padding(8.dp))
            }

            Row(
                modifier = Modifier
                    .padding(vertical = 8.dp)
                    .fillMaxWidth(),
                horizontalArrangement = Arrangement.Center
            ) {
                Text("kategoria: " + DataProvider.getCategoryById(product.categoryId).toString())
            }

            Row(
                modifier = Modifier
                    .padding(vertical = 8.dp)
                    .fillMaxWidth(),
                horizontalArrangement = Arrangement.Center,
                verticalAlignment = Alignment.CenterVertically
            ) {
                Button(onClick = { if (count.intValue > 0) count.intValue -= 1 }) { Text("-") }
                Text(count.intValue.toString(), modifier = Modifier.padding(8.dp))
                Button(onClick = { count.intValue += 1 }) { Text("+") }

            }
            Row(
                modifier = Modifier
                    .padding(vertical = 8.dp)
                    .fillMaxWidth(),
                horizontalArrangement = Arrangement.Center,
                verticalAlignment = Alignment.CenterVertically
            ) {
                IconButton(
                    onClick = {
                        DataProvider.addProductToCart(product.id, count.intValue)
                        count.intValue = 0
                    },

                    ) {
                    Icon(
                        imageVector = Icons.Filled.ShoppingCart,
                        contentDescription = "Koszyk",
                        Modifier.fillMaxSize()
                    )
                }
            }
        }
    }


}

@Preview(showBackground = true)
@Composable
fun ShowProductScreen() {
    val sampleProduct: Product = Product(100, "applee", 20.6, 1)
    ProductScreen(DataProvider.getAllProducts()[0])
}

