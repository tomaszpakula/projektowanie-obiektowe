echo -e "Get cart items"
curl -s -X GET http://localhost:8080/cart | jq

echo -e "Add new cart item\n"
curl -s -X POST http://localhost:8080/cart -H "Content-Type: application/json" -d '{"productId":2, "quantity" : 2}' | jq

echo -e "Add new cart item\n"
curl -s -X POST http://localhost:8080/cart -H "Content-Type: application/json" -d '{"productId":2, "quantity" : 2}' | jq

echo -e "Get cart items"
curl -s -X GET http://localhost:8080/cart | jq

echo -e "Update cart item with  id 2\n"
curl -s -X PUT http://localhost:8080/cart/2 -H "Content-Type: application/json" -d 4 | jq

echo -e "Get all cart items\n"
curl -s -X GET http://localhost:8080/cart | jq

echo -e "Delete cart with id 2\n"
curl -s -X DELETE http://localhost:8080/cart/2 | jq

echo -e "Get all cart items\n"
curl -s -X GET http://localhost:8080/cart | jq