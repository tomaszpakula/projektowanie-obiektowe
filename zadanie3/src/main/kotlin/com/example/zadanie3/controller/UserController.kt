package com.example.zadanie3.controller

import com.example.zadanie3.model.User
import org.springframework.web.bind.annotation.GetMapping
import org.springframework.web.bind.annotation.RequestMapping
import org.springframework.web.bind.annotation.RestController

@RestController
@RequestMapping("/users")
class UserController {
    private val users = listOf(
        User(1, "Tomasz"),
        User(2, "Jakub"),
        User(3, "Jan")
    )

    @GetMapping
    fun getAllUsers(): List<User> {
        return users
    }
}