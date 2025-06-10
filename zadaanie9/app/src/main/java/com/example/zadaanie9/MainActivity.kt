package com.example.zadaanie9

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Scaffold
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import com.example.zadaanie9.ui.theme.Zadaanie9Theme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContent {
            Zadaanie9Theme {
                Surface (modifier = Modifier.fillMaxSize().padding(top=18.dp), color = MaterialTheme.colorScheme.background) {
                    ProductList()
                }
            }
        }
    }
}

@Preview(showBackground = true)
@Composable
fun ProductList() {
    Zadaanie9Theme {
        ProductListScreen()
    }
}