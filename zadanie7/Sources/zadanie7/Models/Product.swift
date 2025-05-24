import Vapor

struct Product: Content, Codable, Hashable {
    var id: UUID
    var name: String
    var price: Float
    var categoryID: UUID
}

