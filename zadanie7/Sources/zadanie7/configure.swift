import Fluent
import FluentSQLiteDriver
import Vapor
import Leaf

public func configure(_ app: Application) async throws {
    app.databases.use(.sqlite(.file("db.sqlite")), as: .sqlite)

    app.migrations.add(CreateCategory())
    app.migrations.add(CreateProduct())

    try await app.autoMigrate().get()

    app.views.use(.leaf)

    try routes(app)
}
