// import Vapor
// import Redis
// import Fluent

// struct CreateProductsJSONList: AsyncMigration {
//     func prepare(on database: any Database) async throws {
//         let redis = database.context.application.redis
//         _ = try await redis.send(command: "JSON.SET", with: ["produkty", "$", "[]"])
//     }

//     func revert(on database: any Database) async throws {
//         let redis = database.context.application.redis
//         _ = try await redis.send(command: "DEL", with: ["produkty"])
//     }
// }
