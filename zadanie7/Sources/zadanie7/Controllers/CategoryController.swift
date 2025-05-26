import Fluent
import Vapor

struct CategoryFormData: Content {
    let name: String
}

struct CategoryListContext: Content {
    let categories: [Category]
    let success: Bool?
}

struct CategoryController: RouteCollection {
    func boot(routes: any RoutesBuilder) throws {
        let categories = routes.grouped("categories")
        categories.get(use: index)
        categories.post(use: create)
        categories.get(":categoryID", use: show)
        categories.put(":categoryID", use: update)
        categories.delete(":categoryID", use: delete)
    }

    // GET /categories
    func index(req: Request) throws -> EventLoopFuture<[Category]> {
        return Category.query(on: req.db).all()
    }

    // POST /categories
    func create(req: Request) throws -> EventLoopFuture<Category> {
        let formData = try req.content.decode(CategoryFormData.self)
        let category = Category(name: formData.name)
        return category.save(on: req.db).map { category }
    }

    // GET /categories/:categoryID
    func show(req: Request) throws -> EventLoopFuture<Category> {
        return Category.find(req.parameters.get("categoryID"), on: req.db)
            .unwrap(or: Abort(.notFound))
    }

    // PUT /categories/:categoryID
    func update(req: Request) throws -> EventLoopFuture<Category> {
        let updated = try req.content.decode(Category.self)

        return Category.find(req.parameters.get("categoryID"), on: req.db)
            .unwrap(or: Abort(.notFound)).flatMap { category in
                category.name = updated.name
                return category.save(on: req.db).map { category }
            }
    }

    // DELETE /categories/:categoryID
    func delete(req: Request) throws -> EventLoopFuture<HTTPStatus> {
        return Category.find(req.parameters.get("categoryID"), on: req.db)
            .unwrap(or: Abort(.notFound))
            .flatMap { $0.delete(on: req.db) }
            .transform(to: .noContent)
    }
}
