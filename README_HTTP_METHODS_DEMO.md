# Example curl requests for each HTTP method

## GET all posts
```
curl -X GET http://localhost:8000/posts
```

## POST create a post
```
curl -X POST http://localhost:8000/posts -H "Content-Type: application/json" -d '{"title":"Sample","content":"Demo content"}'
```

## PUT update a post
```
curl -X PUT http://localhost:8000/posts/1 -H "Content-Type: application/json" -d '{"title":"Updated","content":"Updated content"}'
```

## DELETE a post
```
curl -X DELETE http://localhost:8000/posts/1
```

## PATCH a post
```
curl -X PATCH http://localhost:8000/posts/1 -H "Content-Type: application/json" -d '{"title":"Patched"}'
```

## HEAD a post
```
curl -I -X HEAD http://localhost:8000/posts/1
```

## OPTIONS for posts
```
curl -X OPTIONS -i http://localhost:8000/posts
```
