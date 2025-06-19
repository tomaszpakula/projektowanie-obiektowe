package com.example.zadaanie9

import io.ktor.client.HttpClient
import io.ktor.client.call.body
import io.ktor.client.engine.cio.CIO
import io.ktor.client.plugins.contentnegotiation.ContentNegotiation
import io.ktor.client.request.post
import io.ktor.client.request.setBody
import io.ktor.http.ContentType
import io.ktor.http.contentType
import io.ktor.http.isSuccess
import io.ktor.serialization.kotlinx.json.json
import kotlinx.serialization.json.Json
import kotlinx.serialization.json.jsonObject
import kotlinx.serialization.json.jsonPrimitive

object StripeApi {
    private val client = HttpClient(CIO) {
        install(ContentNegotiation){
            json(
                Json {
                    ignoreUnknownKeys = true
                    prettyPrint = true
                }
            )
        }
    }

    suspend fun createCheckoutSession(products: List<SerializableProduct>): String? {
        return try {
            val response = client.post("http://192.168.100.32:8000/create-checkout-session") {
                contentType(ContentType.Application.Json)
                setBody(ProductsWrapper(products))
            }

            if (response.status.isSuccess()) {
                val body = response.body<String>()
                val json = Json.parseToJsonElement(body)
                json.jsonObject["url"]?.jsonPrimitive?.content
            } else null
        } catch (e: Exception) {
            println("Błąd podczas płatności: ${e.message}")
            null
        }
    }

}