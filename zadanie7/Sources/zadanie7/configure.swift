import Vapor
import Redis

public func configure(_ app: Application) async throws {
    // Redis configuration (default: localhost:6379)
    app.redis.configuration = try RedisConfiguration(hostname: "127.0.0.1", port: 6379)
    
    // Setting empty product list to Redis
    let _ = app.redis.set("products", to: "[]".data(using: .utf8)!)
    let _ = app.redis.set("categories", to: "[]".data(using: .utf8)!)
        
    try routes(app)
}

