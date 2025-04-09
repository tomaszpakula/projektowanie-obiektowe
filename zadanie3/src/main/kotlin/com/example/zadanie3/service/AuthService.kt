package com.example.zadanie3.service

import com.example.zadanie3.model.User
import org.springframework.stereotype.Service

@Service
class AuthService {

    private val users = listOf(
        User(1, "Tomasz","123"),
        User(2, "Jakub","456"),
        User(3, "Jan","567")
    )

    fun getUsers(): List<User> {
        return users
    }

    fun authorize(username: String, password: String): Boolean {
        return users.any { it.username == username && it.password == password }
    }

}