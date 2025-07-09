@extends('layouts.app')



@section('content')
<div class="container">
    <h1>HTTP Status Codes Demo</h1>
    <!-- Glossary/FAQ Button -->
    <button type="button" class="btn btn-outline-secondary mb-3" data-bs-toggle="modal" data-bs-target="#glossaryModal" aria-label="Open HTTP Status Codes Glossary and FAQ">
        📖 Glossary / FAQ
    </button>
</div>

<!-- Glossary / FAQ Modal -->
<div class="modal fade" id="glossaryModal" tabindex="-1" aria-labelledby="glossaryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="glossaryModalLabel">HTTP Status Codes Glossary & FAQ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>Glossary</h6>
        <dl>
          <dt>HTTP</dt>
          <dd>HyperText Transfer Protocol – the foundation of data communication for the web.</dd>
          <dt>Status Code</dt>
          <dd>A 3-digit number sent by a server to indicate the result of a request (e.g., 200, 404).</dd>
          <dt>2xx Success</dt>
          <dd>Codes that mean the request was successfully received, understood, and accepted.</dd>
          <dt>3xx Redirection</dt>
          <dd>Codes that mean further action needs to be taken to complete the request (like a redirect).</dd>
          <dt>4xx Client Error</dt>
          <dd>Codes that mean the request has an error (like a bad URL or missing authentication).</dd>
          <dt>5xx Server Error</dt>
          <dd>Codes that mean the server failed to fulfill a valid request due to an error on the server side.</dd>
          <dt>Resource</dt>
          <dd>Any data or service available on the web (like a post, user, or image).</dd>
          <dt>Endpoint</dt>
          <dd>A specific URL where an API can be accessed by a client application.</dd>
        </dl>
        <hr>
        <h6>FAQ</h6>
        <div class="accordion" id="faqAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq1-heading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                What is an HTTP status code?
              </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse" aria-labelledby="faq1-heading" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                An HTTP status code is a number returned by a web server to tell your browser or client what happened with your request. For example, 200 means success, 404 means not found.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq2-heading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                Why do some status codes start with 4 and others with 5?
              </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq2-heading" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Codes starting with 4 (4xx) mean there was a problem with the request from the client (like a bad URL or missing data). Codes starting with 5 (5xx) mean the server had a problem processing a valid request.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq3-heading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                What does 201 Created mean?
              </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faq3-heading" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                201 Created means your request resulted in a new resource being created on the server, like adding a new post or user.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq4-heading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                What is the difference between 401 Unauthorized and 403 Forbidden?
              </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faq4-heading" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                401 means you need to log in or provide credentials. 403 means you are logged in but do not have permission to access the resource.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq5-heading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                Where can I learn more about HTTP status codes?
              </button>
            </h2>
            <div id="faq5" class="accordion-collapse collapse" aria-labelledby="faq5-heading" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                The <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Status" target="_blank" rel="noopener">MDN Web Docs</a> provide a comprehensive list and explanations of all HTTP status codes.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    {{-- Status code buttons grouped by category --}}
    <div class="mb-3">
        <div class="row">
            <div class="col-md-6 mb-2">
                <h5>2xx Success</h5>
                {{-- 2xx Success Codes --}}
                <button class="btn btn-success mb-1 w-100 text-start status-btn" onclick="sendStatus('ok')" aria-label="Try 200 OK">200 OK</button>
                <button class="btn btn-primary mb-1 w-100 text-start status-btn" onclick="sendStatus('created')" aria-label="Try 201 Created">201 Created</button>
                <button class="btn btn-secondary mb-1 w-100 text-start status-btn" onclick="sendStatus('nocontent')" aria-label="Try 204 No Content">204 No Content</button>
            </div>
            <div class="col-md-6 mb-2">
                <h5>3xx Redirection</h5>
                {{-- 3xx Redirection Codes --}}
                <button class="btn btn-info mb-1 w-100 text-start status-btn" onclick="sendStatus('moved')" aria-label="Try 301 Moved Permanently">301 Moved Permanently</button>
            </div>
            <div class="col-md-6 mb-2">
                <h5>4xx Client Error</h5>
                {{-- 4xx Client Error Codes --}}
                <button class="btn btn-warning mb-1 w-100 text-start status-btn" onclick="sendStatus('bad')" aria-label="Try 400 Bad Request">400 Bad Request</button>
                <button class="btn btn-dark mb-1 w-100 text-start status-btn" onclick="sendStatus('unauthorized')" aria-label="Try 401 Unauthorized">401 Unauthorized</button>
                <button class="btn btn-dark mb-1 w-100 text-start status-btn" onclick="sendStatus('forbidden')" aria-label="Try 403 Forbidden">403 Forbidden</button>
                <button class="btn btn-danger mb-1 w-100 text-start status-btn" onclick="sendStatus('notfound')" aria-label="Try 404 Not Found">404 Not Found</button>
                <button class="btn btn-warning mb-1 w-100 text-start status-btn" onclick="sendStatus('unprocessable')" aria-label="Try 422 Unprocessable Entity">422 Unprocessable Entity</button>
            </div>
            <div class="col-md-6 mb-2">
                <h5>5xx Server Error</h5>
                {{-- 5xx Server Error Codes --}}
                <button class="btn btn-danger mb-1 w-100 text-start status-btn" onclick="sendStatus('error')" aria-label="Try 500 Internal Server Error">500 Internal Server Error</button>
            </div>
        </div>
    </div>
    <h2 class="h4 mt-5 mb-3">Request Example</h2>
    <div class="card mb-3">
        <div class="card-header">Request & Curl Example</div>
        <div class="card-body">
            <div id="curl-example" class="mb-2"></div>
            <div id="api-example" class="mb-2"></div>
        </div>
    </div>

    <h2 class="h4 mt-5 mb-3">Real-World API Response Example</h2>
    <div class="card mb-3">
        <div class="card-header">API Request & Response</div>
        <div class="card-body">
            <div id="api-request-example" class="mb-2"></div>
            <div id="api-response-example" class="mb-2"></div>
        </div>
    </div>
    <h2 class="h4 mt-5 mb-3">Test Yourself</h2>
    <div class="card mb-4 shadow border-primary border-2">
        <div class="card-header bg-primary text-white">Quiz: Which Status Code?</div>
        <div class="card-body">
            <form id="status-quiz-form">
                <div class="mb-3">
                    <label for="quiz-question" class="form-label"><strong id="quiz-question">Loading question...</strong></label>
                    <div id="quiz-options"></div>
                </div>
                <button type="submit" class="btn btn-success">Submit Answer</button>
                <button type="button" class="btn btn-link" id="next-quiz-question" style="display:none;">Next Question</button>
                <div id="quiz-feedback" class="mt-3" tabindex="-1"></div>
            </form>
        </div>
    </div>
    <h2 class="h4 mt-5 mb-3">Response & Explanation</h2>
    <div class="card mb-3 animate-response" id="response-card">
        <div class="card-header">Response</div>
        <div class="card-body">
            <div id="response-status"></div>
            <div id="response-body"></div>
            <div id="status-explanation" class="mt-2 text-info"></div>
        </div>
    </div>
</div>
{{-- JavaScript and styles moved to scripts stack --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
var lastSelectedBtn = null;
// --- Quiz Data ---
const quizQuestions = [
    {
        question: "Which status code means 'Not Found'?",
        correct: "404",
        options: ["200", "201", "404", "500"]
    },
    {
        question: "Which code is used when a new resource is created?",
        correct: "201",
        options: ["200", "201", "204", "400"]
    },
    {
        question: "What status code means the server had an error?",
        correct: "500",
        options: ["400", "403", "404", "500"]
    },
    {
        question: "Which code means the request was successful and there is no content?",
        correct: "204",
        options: ["200", "201", "204", "301"]
    },
    {
        question: "Which code means you are not authorized (not logged in)?",
        correct: "401",
        options: ["401", "403", "404", "422"]
    },
    {
        question: "Which code means the request was invalid (bad syntax)?",
        correct: "400",
        options: ["200", "400", "404", "500"]
    },
    {
        question: "Which code means you are authenticated but not allowed?",
        correct: "403",
        options: ["401", "403", "404", "422"]
    },
    {
        question: "Which code means the resource was moved permanently?",
        correct: "301",
        options: ["200", "301", "400", "500"]
    },
    {
        question: "Which code means the request was well-formed but invalid (e.g., bad data)?",
        correct: "422",
        options: ["400", "401", "422", "500"]
    },
];
let quizIndex = 0;
function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}
function loadQuizQuestion() {
    const q = quizQuestions[quizIndex];
    document.getElementById('quiz-question').innerText = q.question;
    let opts = [...q.options];
    shuffle(opts);
    document.getElementById('quiz-options').innerHTML = opts.map(opt =>
        `<div class='form-check'>
            <input class='form-check-input' type='radio' name='quiz-option' id='quiz-opt-${opt}' value='${opt}' required>
            <label class='form-check-label' for='quiz-opt-${opt}'>${opt}</label>
        </div>`
    ).join('');
    document.getElementById('quiz-feedback').innerText = '';
    document.getElementById('next-quiz-question').style.display = 'none';
}
function handleQuizSubmit(e) {
    e.preventDefault();
    const q = quizQuestions[quizIndex];
    const selected = document.querySelector('input[name="quiz-option"]:checked');
    if (!selected) return;
    if (selected.value === q.correct) {
        document.getElementById('quiz-feedback').innerHTML = `<span class='text-success'>✅ Correct! ${q.correct} is the right answer.</span>`;
    } else {
        document.getElementById('quiz-feedback').innerHTML = `<span class='text-danger'>❌ Incorrect. The correct answer is ${q.correct}.</span>`;
    }
    document.getElementById('next-quiz-question').style.display = 'inline-block';
}
function handleNextQuiz() {
    quizIndex = (quizIndex + 1) % quizQuestions.length;
    loadQuizQuestion();
}
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('status-quiz-form')) {
        loadQuizQuestion();
        document.getElementById('status-quiz-form').addEventListener('submit', handleQuizSubmit);
        document.getElementById('next-quiz-question').addEventListener('click', handleNextQuiz);
    }
    // Focus feedback for accessibility
    const feedback = document.getElementById('quiz-feedback');
    if (feedback) {
        feedback.addEventListener('DOMSubtreeModified', function() {
            feedback.focus();
        });
    }
});
// Metadata for each status code button (must be global)
window.statusMeta = {
    ok: {
        code: 200,
        name: 'OK',
        color: 'success',
        explanation: 'The request has succeeded.',
        api: {
            request: `GET /api/posts HTTP/1.1\nHost: example.com`,
            response: `HTTP/1.1 200 OK\nContent-Type: application/json\n\n[{\n  "id": 1,\n  "title": "First Post"\n}]`
        },
        scenario: 'Fetching a list of posts successfully.',
        mdn: 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/200'
    },
    created: {
        code: 201,
        name: 'Created',
        color: 'primary',
        explanation: 'A new resource has been created as a result of the request.',
        api: {
            request: `POST /api/posts HTTP/1.1\nHost: example.com\nContent-Type: application/json\n\n{\n  "title": "New Post"\n}`,
            response: `HTTP/1.1 201 Created\nContent-Type: application/json\nLocation: /api/posts/2\n\n{\n  "id": 2,\n  "title": "New Post"\n}`
        },
        scenario: 'Creating a new post.',
        mdn: 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/201'
    },
    nocontent: {
        code: 204,
        name: 'No Content',
        color: 'secondary',
        explanation: 'The server successfully processed the request, but is not returning any content.',
        api: {
            request: `DELETE /api/posts/2 HTTP/1.1\nHost: example.com`,
            response: `HTTP/1.1 204 No Content`
        },
        scenario: 'Deleting a post successfully.',
        mdn: 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/204'
    },
    moved: {
        code: 301,
        name: 'Moved Permanently',
        color: 'info',
        explanation: 'The resource has been moved to a new URL.',
        api: {
            request: `GET /old-page HTTP/1.1\nHost: example.com`,
            response: `HTTP/1.1 301 Moved Permanently\nLocation: /new-page`
        },
        scenario: 'A page has been permanently redirected to a new address.',
        mdn: 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/301'
    },
    bad: {
        code: 400,
        name: 'Bad Request',
        color: 'warning',
        explanation: 'The server could not understand the request due to invalid syntax.',
        api: {
            request: `POST /api/posts HTTP/1.1\nHost: example.com\nContent-Type: application/json\n\n{}`,
            response: `HTTP/1.1 400 Bad Request\nContent-Type: application/json\n\n{\n  "error": "Title is required."\n}`
        },
        scenario: 'Submitting a form with missing required fields.',
        mdn: 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/400'
    },
    unauthorized: {
        code: 401,
        name: 'Unauthorized',
        color: 'dark',
        explanation: 'Authentication is required and has failed or has not yet been provided.',
        api: {
            request: `GET /api/user HTTP/1.1\nHost: example.com`,
            response: `HTTP/1.1 401 Unauthorized\nWWW-Authenticate: Bearer\nContent-Type: application/json\n\n{\n  "error": "Authentication required."\n}`
        },
        scenario: 'Trying to access a user profile without logging in.',
        mdn: 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/401'
    },
    forbidden: {
        code: 403,
        name: 'Forbidden',
        color: 'dark',
        explanation: 'The client does not have access rights to the content.',
        api: {
            request: `DELETE /api/posts/1 HTTP/1.1\nHost: example.com\nAuthorization: Bearer <token>`,
            response: `HTTP/1.1 403 Forbidden\nContent-Type: application/json\n\n{\n  "error": "You do not have permission to delete this post."\n}`
        },
        scenario: 'Trying to delete a post you do not own.',
        mdn: 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/403'
    },
    notfound: {
        code: 404,
        name: 'Not Found',
        color: 'danger',
        explanation: 'The server can not find the requested resource.',
        api: {
            request: `GET /api/posts/999 HTTP/1.1\nHost: example.com`,
            response: `HTTP/1.1 404 Not Found\nContent-Type: application/json\n\n{\n  "error": "Post not found."\n}`
        },
        scenario: 'Visiting a URL for a post that does not exist.',
        mdn: 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/404'
    },
    unprocessable: {
        code: 422,
        name: 'Unprocessable Entity',
        color: 'warning',
        explanation: 'The request was well-formed but was unable to be followed due to semantic errors.',
        api: {
            request: `POST /api/posts HTTP/1.1\nHost: example.com\nContent-Type: application/json\n\n{\n  "title": "Hi"\n}`,
            response: `HTTP/1.1 422 Unprocessable Entity\nContent-Type: application/json\n\n{\n  "error": "Title must be at least 3 characters."\n}`
        },
        scenario: 'Submitting a form with invalid data (e.g., too short a title).',
        mdn: 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/422'
    },
    error: {
        code: 500,
        name: 'Internal Server Error',
        color: 'danger',
        explanation: 'The server has encountered a situation it doesn\'t know how to handle.',
        api: {
            request: `GET /api/posts HTTP/1.1\nHost: example.com`,
            response: `HTTP/1.1 500 Internal Server Error\nContent-Type: application/json\n\n{\n  "error": "Unexpected server error."\n}`
        },
        scenario: 'A bug in the server code causes an exception.',
        mdn: 'https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/500'
    }
};
// End statusMeta
// Sends an AJAX request to the backend for the selected status code
function sendStatus(type) {
    let meta = statusMeta[type];
    let url = `/status/${type}`;
    let curl = `curl -i -X GET '${window.location.origin}${url}'`;
    document.getElementById('curl-example').innerText = curl;
    // Highlight selected button
    if (lastSelectedBtn) lastSelectedBtn.classList.remove('selected');
    const btns = document.querySelectorAll('.status-btn');
    btns.forEach(btn => {
        if (btn.innerText.includes(meta.code)) {
            btn.classList.add('selected');
            lastSelectedBtn = btn;
        }
    });
    axios.get(url).then(r => {
        showStatus(type, r.status, r.data);
    }).catch(e => {
        // If the server returns an error response, show it
        if (e.response) {
            showStatus(type, e.response.status, e.response.data);
        } else {
            // If the error is not from the server (e.g., network), show the error message
            showStatus(type, 'Error', e.message);
        }
    });
}
// Updates the UI with the response and educational info for the selected status code
function showStatus(type, status, data) {
    const meta = statusMeta[type];
    document.getElementById('response-status').innerHTML = `<span class='badge bg-${meta.color} fs-5'>${meta.code} ${meta.name}</span>`;
    document.getElementById('response-body').innerText = typeof data === 'object' ? JSON.stringify(data, null, 2) : data;
    document.getElementById('status-explanation').innerHTML = `<strong>Explanation:</strong> ${meta.explanation}<br><strong>Scenario:</strong> ${meta.scenario}<br><a href='${meta.mdn}' target='_blank' rel='noopener'>Learn more on MDN</a>`;
    // Animate response card
    const card = document.getElementById('response-card');
    card.classList.remove('flash');
    void card.offsetWidth; // trigger reflow
    card.classList.add('flash');
    setTimeout(() => card.classList.remove('flash'), 400);
}
// Make sendStatus globally available for inline onclick handlers
window.sendStatus = sendStatus;

// Show real-world API example for the selected status code
function showApiExample(type) {
    const meta = statusMeta[type];
    if (meta.api) {
        document.getElementById('api-request-example').innerHTML = `<strong>Request:</strong><pre class='bg-light p-2 border rounded'>${meta.api.request}</pre>`;
        document.getElementById('api-response-example').innerHTML = `<strong>Response:</strong><pre class='bg-light p-2 border rounded'>${meta.api.response}</pre>`;
    } else {
        document.getElementById('api-request-example').innerHTML = '';
        document.getElementById('api-response-example').innerHTML = '';
    }
}
</script>
<style>
    .status-btn.selected, .status-btn:focus {
        outline: 2px solid #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
        background-color: #e7f1ff !important;
        color: #0d6efd !important;
    }
    .animate-response {
        transition: box-shadow 0.3s, border-color 0.3s;
    }
    .animate-response.flash {
        box-shadow: 0 0 0 0.25rem #0d6efd33;
        border-color: #0d6efd;
    }
</style>
@endpush
@endsection
</script>
<style>
    .status-btn.selected, .status-btn:focus {
        outline: 2px solid #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
        background-color: #e7f1ff !important;
        color: #0d6efd !important;
    }
    .animate-response {
        transition: box-shadow 0.3s, border-color 0.3s;
    }
    .animate-response.flash {
        box-shadow: 0 0 0 0.25rem #0d6efd33;
        border-color: #0d6efd;
    }

</style>
<script>
// Sends an AJAX request to the backend for the selected status code
function sendStatus(type) {
    let meta = statusMeta[type];
    let url = `/status/${type}`;
    let curl = `curl -i -X GET '${window.location.origin}${url}'`;
    document.getElementById('curl-example').innerText = curl;
    // Highlight selected button
    if (lastSelectedBtn) lastSelectedBtn.classList.remove('selected');
    const btns = document.querySelectorAll('.status-btn');
    btns.forEach(btn => {
        if (btn.innerText.includes(meta.code)) {
            btn.classList.add('selected');
            lastSelectedBtn = btn;
        }
    });
    axios.get(url).then(r => {
        showStatus(type, r.status, r.data);
        showApiExample(type);
    }).catch(e => {
        // If the server returns an error response, show it
        if (e.response) {
            showStatus(type, e.response.status, e.response.data);
            showApiExample(type);
        } else {
            // If the error is not from the server (e.g., network), show the error message
            showStatus(type, 'Error', e.message);
            showApiExample(type);
        }
    });
}
// Updates the UI with the response and educational info for the selected status code
function showStatus(type, status, data) {
    const meta = statusMeta[type];
    document.getElementById('response-status').innerHTML = `<span class='badge bg-${meta.color} fs-5'>${meta.code} ${meta.name}</span>`;
    document.getElementById('response-body').innerText = typeof data === 'object' ? JSON.stringify(data, null, 2) : data;
    document.getElementById('status-explanation').innerHTML = `<strong>Explanation:</strong> ${meta.explanation}<br><strong>Scenario:</strong> ${meta.scenario}<br><a href='${meta.mdn}' target='_blank' rel='noopener'>Learn more on MDN</a>`;
    // Animate response card
    const card = document.getElementById('response-card');
    card.classList.remove('flash');
    void card.offsetWidth; // trigger reflow
    card.classList.add('flash');
    setTimeout(() => card.classList.remove('flash'), 400);
}
// Make sendStatus globally available for inline onclick handlers
window.sendStatus = sendStatus;
</script>
<style>
    .status-btn.selected, .status-btn:focus {
        outline: 2px solid #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
        background-color: #e7f1ff !important;
        color: #0d6efd !important;
    }
    .animate-response {
        transition: box-shadow 0.3s, border-color 0.3s;
    }
    .animate-response.flash {
        box-shadow: 0 0 0 0.25rem #0d6efd33;
        border-color: #0d6efd;
    }
</style>

