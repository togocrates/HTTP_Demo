<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StatusCodeDemoController extends Controller
{
    // 200 OK: The request was successful.
    // Example: Fetching a list of posts.
    public function ok() {
        // Return a JSON response with status 200
        return response()->json(['message' => 'OK'], 200);
    }

    // 201 Created: A new resource was created.
    // Example: Creating a new post.
    public function created() {
        // Return a JSON response with status 201
        return response()->json(['message' => 'Created'], 201);
    }

    // 204 No Content: The request was successful, but there is no content to return.
    // Example: Deleting a post.
    public function noContent() {
        // Return an empty response with status 204
        return response()->noContent();
    }

    // 301 Moved Permanently: The resource has moved to a new URL.
    // Example: Redirecting to a new page.
    public function movedPermanently() {
        // Redirect to the OK status endpoint with a 301 status
        return redirect('/status/ok', 301);
    }

    // 400 Bad Request: The request was invalid.
    // Example: Submitting a form with missing fields.
    public function badRequest() {
        // Return a JSON response with status 400
        return response()->json(['message' => 'Bad Request'], 400);
    }

    // 401 Unauthorized: Authentication is required or failed.
    // Example: Accessing a profile without logging in.
    public function unauthorized() {
        // Return a JSON response with status 401
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // 403 Forbidden: The user is authenticated but not allowed.
    // Example: Trying to delete someone else's post.
    public function forbidden() {
        // Return a JSON response with status 403
        return response()->json(['message' => 'Forbidden'], 403);
    }

    // 404 Not Found: The resource does not exist.
    // Example: Visiting a non-existent post URL.
    public function notFound() {
        // Return a JSON response with status 404
        return response()->json(['message' => 'Not Found'], 404);
    }

    // 422 Unprocessable Entity: The request was well-formed but invalid.
    // Example: Submitting a form with invalid data.
    public function unprocessable() {
        // Return a JSON response with status 422
        return response()->json(['message' => 'Unprocessable Entity'], 422);
    }

    // 500 Internal Server Error: A generic server error occurred.
    // Example: A bug in the server code.
    public function serverError() {
        // Abort with a 500 error and message
        abort(500, 'Internal Server Error');
    }
}
