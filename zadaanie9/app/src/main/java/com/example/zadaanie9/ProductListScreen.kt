package com.example.zadaanie9

import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.foundation.lazy.items
import androidx.compose.material3.Button

@Preview(showBackground = true)
@Composable
fun ProductListScreen() {
    val products = DataProvider.getAllProducts()

    Column(modifier=Modifier.padding(16.dp)) {
        Text("Lista produktów", modifier = Modifier.padding(bottom = 8.dp))

        LazyColumn {
            items(products) { product ->
                Row(
                    modifier = Modifier
                        .fillMaxWidth()
                        .padding(vertical = 8.dp),
                    horizontalArrangement = Arrangement.SpaceBetween
                ) {
                    Text(product.name)
                    Text(product.price.toString() + " zł")
                    Text("kategoria: " + DataProvider.getCategoryById(product.categoryId).toString())
                }

            }
        }
    }

}