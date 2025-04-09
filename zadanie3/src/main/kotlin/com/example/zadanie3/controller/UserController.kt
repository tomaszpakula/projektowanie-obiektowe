package com.example.zadanie3.controller

import com.example.zadanie3.model.User
import com.example.zadanie3.service.AuthService
import org.springframework.web.bind.annotation.GetMapping
import org.springframework.web.bind.annotation.RequestMapping
import org.springframework.web.bind.annotation.RestController

@RestController
@RequestMapping("/users")
class UserController(private val authService: AuthService) {


    @GetMapping
    fun getAllUsers(): List<User> {
        var users: List<User> = authService.getUsers();
       return listOf(users.get(0), users.get(1));
    }
}