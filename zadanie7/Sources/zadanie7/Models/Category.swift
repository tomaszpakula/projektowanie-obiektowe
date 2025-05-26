import Fluent
import Vapor

final class Category: Model, Content, @unchecked Sendable {
    static let schema = "categories"

    @ID(key: .id)
    var id: UUID?

    @Field(key: "name")
    var name: String

    @Children(for: \.$category)
    var products: [Product]

    init() { }

    init(id: UUID? = nil, name: String) {
        self.id = id
        self.name = name
    }

    enum CodingKeys: CodingKey {
        case id, name
    }
}
