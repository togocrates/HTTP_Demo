const statusExplanations = {
    200: 'OK: The request has succeeded.',
    201: 'Created: The request has succeeded and a new resource has been created.',
    204: 'No Content: The server successfully processed the request, but is not returning any content.',
    400: 'Bad Request: The server could not understand the request due to invalid syntax.',
    401: 'Unauthorized: The client must authenticate itself to get the requested response.',
    403: 'Forbidden: The client does not have access rights to the content.',
    404: 'Not Found: The server can not find the requested resource.',
    405: 'Method Not Allowed: The request method is known by the server but is not supported by the target resource.',
    422: 'Unprocessable Entity: The request was well-formed but was unable to be followed due to semantic errors.',
    500: 'Internal Server Error: The server has encountered a situation it doesn\'t know how to handle.'
};

function getStatusExplanation(status) {
    return statusExplanations[status] || '';
}

function curlForRequest(config) {
    let curl = `curl -X ${config.method.toUpperCase()} '${window.location.origin}${config.url}'`;
    if (config.headers) {
        for (const [k, v] of Object.entries(config.headers)) {
            curl += ` -H '${k}: ${v}'`;
        }
    }
    if (config.data) {
        curl += ` -d '${JSON.stringify(config.data)}'`;
    }
    return curl;
}

export { getStatusExplanation, curlForRequest };
