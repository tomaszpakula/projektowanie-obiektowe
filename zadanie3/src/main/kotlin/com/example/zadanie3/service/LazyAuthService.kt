package com.example.zadanie3.service

import org.springframework.context.annotation.Lazy
import org.springframework.context.annotation.Profile
import org.springframework.stereotype.Service

@Lazy
@Service("lazyAuthService")
@Profile("lazy")
class LazyAuthService: AuthService() {
    init {
        println("Lazy AuthService Created")
    }
}