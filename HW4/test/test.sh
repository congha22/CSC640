#!/bin/bash

BASE_URL="http://localhost:8000/api"

echo "===== Testing API ====="

# 1. Register user
echo "1. Register user"
curl -s -X POST "$BASE_URL/auth/register" \
-H "Content-Type: application/json" \
-d '{"name":"test","email":"test@example.com","password":"test"}'
echo -e "\n"

# 2. Login user
echo "2. Login user"
TOKEN=$(curl -s -X POST "$BASE_URL/auth/login" \
-H "Content-Type: application/json" \
-d '{"email":"test@example.com","password":"test"}' | jq -r '.token')
echo "Token: $TOKEN"
echo -e "\n"

# 3. Get all items
echo "3. GET /items"
curl -s -X GET "$BASE_URL/items"
echo -e "\n"

# 4. Get single item (example id=1)
echo "4. GET /items/1"
curl -s -X GET "$BASE_URL/items/1"
echo -e "\n"

# 5. Create new item (Bearer Token required)
echo "5. POST /items"
curl -s -X POST "$BASE_URL/items" \
-H "Content-Type: application/json" \
-H "Authorization: Bearer $TOKEN" \
-d '{"name":"Item A","description":"Sample item"}'
echo -e "\n"

# 6. Update item (id=1)
echo "6. PUT /items/1"
curl -s -X PUT "$BASE_URL/items/1" \
-H "Content-Type: application/json" \
-H "Authorization: Bearer $TOKEN" \
-d '{"name":"Item A Updated","description":"Updated"}'
echo -e "\n"

# 7. PATCH item (id=1)
echo "7. PATCH /items/1"
curl -s -X PATCH "$BASE_URL/items/1" \
-H "Content-Type: application/json" \
-H "Authorization: Bearer $TOKEN" \
-d 'description=Partially updated'
echo -e "\n"

# 8. DELETE item (id=1)
echo "8. DELETE /items/1"
curl -s -X DELETE "$BASE_URL/items/1" \
-H "Authorization: Bearer $TOKEN"
echo -e "\n"

echo "===== API Test Complete ====="
