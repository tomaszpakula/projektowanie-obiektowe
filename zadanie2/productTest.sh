echo -e "Get all products\n"
curl -s -X GET http://localhost:8000/products | jq

echo -e "Get product by id (product exist)\n"
curl -s -X GET http://localhost:8000/products/1 | jq

echo -e "Get product by id (product doesn't exist)\n"
curl -s -X GET http://localhost:8000/products/10 | jq

echo -e "Create new product\n"
curl -s -X POST http://localhost:8000/products \
  -H "Content-Type: application/json" \
  -d '{"name":"komputer", "price": 3000}' | jq

echo -e "Update product with id 2\n"
curl -s -X PUT http://localhost:8000/products/2 -H "Content-Type: application/json" -d '{"name":"komputer", "price" : 6000}' | jq

echo -e "Get all products\n"
curl -s -X GET http://localhost:8000/products | jq

echo -e "Delete product with id 2\n"
curl -s -X DELETE http://localhost:8000/products/2 | jq

echo -e "Get all products\n"
curl -s -X GET http://localhost:8000/products | jq