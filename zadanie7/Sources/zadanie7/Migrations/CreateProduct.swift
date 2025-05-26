import Fluent

struct CreateProduct: Migration {
    func prepare(on database: any Database) -> EventLoopFuture<Void> {
        database.schema("products")
            .id()
            .field("name", .string, .required)
            .field("price", .float, .required)
            .field("category_id", .uuid, .required, .references("categories", "id", onDelete: .cascade))
            .create()
    }

    func revert(on database: any Database) -> EventLoopFuture<Void> {
        database.schema("products").delete()
    }
}
