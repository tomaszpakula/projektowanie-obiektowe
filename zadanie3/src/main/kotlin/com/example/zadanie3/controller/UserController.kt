package com.example.zadanie3.controller

import com.example.zadanie3.model.User
import com.example.zadanie3.service.AuthService
import com.example.zadanie3.service.EagerAuthService
import com.example.zadanie3.service.LazyAuthService
import org.springframework.beans.factory.annotation.Autowired
import org.springframework.beans.factory.annotation.Qualifier
import org.springframework.context.annotation.Lazy
import org.springframework.web.bind.annotation.*

@RestController
@RequestMapping("/users")
class UserController {

    @Autowired
    @Qualifier("lazyAuthService")
    //If you want to change qualifier change spring.profiles.active in application.properties too
    //@Qualifier("eagerAuthService")
    lateinit var authService: AuthService

    @GetMapping
    fun getAllUsers(): List<Map<String, Any>> {
        var users: List<User> = authService.getUsers();
        return users.map { user ->
            mapOf("id" to user.id, "username" to user.username)
        }
    }

    @PostMapping("/login")
    fun login(@RequestBody user: User): String {
        return if (authService.authorize(user.username, user.password)){
            "Correct"
        } else {
            "Incorrect"
        }
    }


}