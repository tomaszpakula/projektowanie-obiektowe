package com.example.zadanie3.service

import org.springframework.context.annotation.Lazy
import org.springframework.context.annotation.Profile
import org.springframework.stereotype.Service

@Service("eagerAuthService")
@Profile("eager")
class EagerAuthService: AuthService() {
    init {
        println("Eager AuthService Created")
    }

}