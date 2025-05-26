import Fluent
import Vapor

final class Product: Model, Content, @unchecked Sendable {
    static let schema = "products"

    @ID(key: .id)
    var id: UUID?

    @Field(key: "name")
    var name: String

    @Field(key: "price")
    var price: Float

    @Parent(key: "category_id")
    var category: Category

    init() { }

    init(id: UUID? = nil, name: String, price: Float, categoryID: UUID) {
        self.id = id
        self.name = name
        self.price = price
        self.$category.id = categoryID
    }

    enum CodingKeys: CodingKey {
        case id, name, price, category
    }
}
