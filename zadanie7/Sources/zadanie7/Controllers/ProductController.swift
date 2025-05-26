import Fluent
import Vapor

struct ProductFormData: Content {
    let name: String
    let price: Float
    let categoryID: UUID
}

struct ProductContext: Content {
    let data: [Product]
    let success: Bool?
    let categories: [Category]
}

struct ProductController: RouteCollection {
    func boot(routes: any RoutesBuilder) throws {
        let products = routes.grouped("products")
        products.get(use: index)
        products.post(use: create)
        products.get(":productID", use: show)
        products.put(":productID", use: update)
        products.delete(":productID", use: delete)
    }

    func index(req: Request) throws -> EventLoopFuture<View> {
        let success: Bool? = req.query[Bool.self, at: "success"]

        return Product.query(on: req.db).with(\.$category).all().flatMap { products in
            Category.query(on: req.db).all().flatMap { categories in
                let context = ProductContext(data: products, success: success, categories: categories)
                return req.view.render("products", context)
            }
        }
    }

    func create(req: Request) throws -> EventLoopFuture<Response> {
        let formData = try req.content.decode(ProductFormData.self)
        let product = Product(name: formData.name, price: formData.price, categoryID: formData.categoryID)
        return product.save(on: req.db).map {
            req.redirect(to: "/products?success=true")
        }
    }

    func show(req: Request) throws -> EventLoopFuture<Product> {
        Product.find(req.parameters.get("productID"), on: req.db)
            .unwrap(or: Abort(.notFound))
    }

    func update(req: Request) throws -> EventLoopFuture<Product> {
        let updated = try req.content.decode(Product.self)

        return Product.find(req.parameters.get("productID"), on: req.db)
            .unwrap(or: Abort(.notFound)).flatMap { product in
                product.name = updated.name
                product.price = updated.price
                product.$category.id = updated.$category.id
                return product.save(on: req.db).map { product }
            }
    }

    func delete(req: Request) throws -> EventLoopFuture<HTTPStatus> {
        Product.find(req.parameters.get("productID"), on: req.db)
            .unwrap(or: Abort(.notFound))
            .flatMap { $0.delete(on: req.db) }
            .transform(to: .noContent)
    }
}
