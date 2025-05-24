import Vapor

struct ProductFormData: Content {
    let name: String
    let price: Float
    let categoryID: UUID
}



struct ProductController: RouteCollection {
    func boot(routes: any RoutesBuilder) throws {
        let products = routes.grouped("products")
        products.get(use: index)
        //products.post(use: create)
        // products.get(":productID", use: show)
        // products.put(":productID", use: update)
        // products.delete(":productID", use: delete)
    }

   func index(req: Request) -> EventLoopFuture<View> {
        let emptyData: [Product] = []

        return req.redis.get("Products", as: Data.self).flatMap { productsData in
            let products: [Product]
            if let data = productsData,
            let decoded = try? JSONDecoder().decode([Product].self, from: data) {
                products = decoded
            } else {
                products = emptyData
            }

            return req.view.render("products", ["products": products])
        }
    }


    func create(req: Request) -> EventLoopFuture<Response> {
        // Odbierz dane formularza i spróbuj zdekodować do Product
        req.content.decode(Product.self)
    
    }
}


    // func show(req: Request) async throws -> Product {
    //     guard let id = req.parameters.get("productID"),
    //           let data = try await req.redis.get("product:\(id)"),
    //           let product = try? JSONDecoder().decode(Product.self, from: data) else {
    //         throw Abort(.notFound)
    //     }
    //     return product
    // }

    // func update(req: Request) async throws -> Product {
    //     let updated = try req.content.decode(Product.self)
    //     let encoded = try JSONEncoder().encode(updated)
    //     req.redis.set("product:\(updated.id)", to: encoded)
    //     return updated
    // }

    // func delete(req: Request) async throws -> HTTPStatus {
    //     guard let id = req.parameters.get("productID") else {
    //         throw Abort(.badRequest)
    //     }
    //     req.redis.delete("product:\(id)")
    //     return .noContent
    // }
}
