@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1>Posts <small class="text-muted">(HTTP Methods Demo)</small></h1>
        <div>
            <button class="btn btn-outline-info" id="start-tour" type="button" aria-label="Start guided tour">Start Tour</button>
            <button class="btn btn-outline-dark ms-2" id="open-glossary" type="button" aria-label="Open glossary and FAQ">Glossary / FAQ</button>
            <button class="btn btn-outline-secondary ms-2" id="toggle-dark" type="button" aria-label="Toggle dark or light mode">Toggle Dark/Light Mode</button>
            <button class="btn btn-outline-danger ms-2" id="reset-demo" type="button" aria-label="Reset demo data">Reset Demo Data</button>
        </div>
    </div>
    <div class="card mb-4" role="region" aria-label="Scenario Tasks">
        <div class="card-header">Scenario Tasks: Try CRUD Operations</div>
        <div class="card-body">
            <ul id="scenario-tasks" class="list-group list-group-flush">
                <li class="list-group-item" id="task-create"><input type="checkbox" disabled> Create a post (POST)</li>
                <li class="list-group-item" id="task-read"><input type="checkbox" disabled> Read all posts (GET)</li>
                <li class="list-group-item" id="task-update"><input type="checkbox" disabled> Update a post (PUT or PATCH)</li>
                <li class="list-group-item" id="task-delete"><input type="checkbox" disabled> Delete a post (DELETE)</li>
            </ul>
            <div class="progress mt-3">
                <div id="scenario-progress" class="progress-bar" role="progressbar" style="width: 0%">0%</div>
            </div>
        </div>
    </div>
    <div class="accordion mb-4" id="httpDocsAccordion" role="tablist" aria-label="HTTP Documentation">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingRest">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRest" aria-expanded="false" aria-controls="collapseRest">
                    What is REST?
                </button>
            </h2>
            <div id="collapseRest" class="accordion-collapse collapse" aria-labelledby="headingRest" data-bs-parent="#httpDocsAccordion">
                <div class="accordion-body">
                    <strong>REST</strong> (Representational State Transfer) is an architectural style for designing networked applications. It uses HTTP methods to perform actions on resources, such as creating, reading, updating, and deleting data.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingMethods">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMethods" aria-expanded="false" aria-controls="collapseMethods">
                    HTTP Methods Explained
                </button>
            </h2>
            <div id="collapseMethods" class="accordion-collapse collapse" aria-labelledby="headingMethods" data-bs-parent="#httpDocsAccordion">
                <div class="accordion-body">
                    <ul>
                        <li><strong>GET</strong>: Retrieve data from the server.</li>
                        <li><strong>POST</strong>: Create a new resource on the server.</li>
                        <li><strong>PUT</strong>: Replace an existing resource with new data.</li>
                        <li><strong>PATCH</strong>: Update part of an existing resource.</li>
                        <li><strong>DELETE</strong>: Remove a resource from the server.</li>
                        <li><strong>HEAD</strong>: Retrieve headers for a resource, without the body.</li>
                        <li><strong>OPTIONS</strong>: Discover which HTTP methods are supported by the server for a resource.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingScenarios">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseScenarios" aria-expanded="false" aria-controls="collapseScenarios">
                    Example Scenario: CRUD with Posts
                </button>
            </h2>
            <div id="collapseScenarios" class="accordion-collapse collapse" aria-labelledby="headingScenarios" data-bs-parent="#httpDocsAccordion">
                <div class="accordion-body">
                    <ol>
                        <li><strong>Create</strong> a post using <strong>POST</strong>.</li>
                        <li><strong>Read</strong> all posts using <strong>GET</strong>.</li>
                        <li><strong>Update</strong> a post using <strong>PUT</strong> or <strong>PATCH</strong>.</li>
                        <li><strong>Delete</strong> a post using <strong>DELETE</strong>.</li>
                    </ol>
                    Try these steps using the buttons below!
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card" data-intro="This panel shows the request details. You can enter data and try different HTTP methods.">
                <div class="card-header">Request</div>
                <div class="card-body">
                    <div id="request-details"></div>
                    <div class="mb-2">
                        <label>Title</label>
                        <input type="text" id="title" placeholder="Title" class="form-control mb-1" value="Sample Title" data-intro="Enter a title for your post here.">
                        <div class="invalid-feedback" id="title-error"></div>
                        <label>Content</label>
                        <input type="text" id="content" placeholder="Content" class="form-control mb-1" value="Sample Content" data-intro="Enter content for your post here.">
                        <div class="invalid-feedback" id="content-error"></div>
                    </div>
                    <div class="mb-2">
                        <label>Custom Headers (JSON)</label>
                        <input type="text" id="custom-headers" class="form-control mb-1" placeholder='{"X-Demo": "123"}' data-intro="You can add custom headers in JSON format.">
                    </div>
                    <div class="btn-group mb-2" data-intro="Try each HTTP method by clicking these buttons. Hover for a description." role="group" aria-label="HTTP method buttons">
                        <button class="btn btn-primary" id="btn-get" title="GET: Retrieve all posts">GET</button>
                        <button class="btn btn-success" id="btn-post" title="POST: Create a new post">POST</button>
                        <button class="btn btn-warning" id="btn-put" title="PUT: Update a post (replace)">PUT</button>
                        <button class="btn btn-danger" id="btn-delete" title="DELETE: Remove a post">DELETE</button>
                        <button class="btn btn-info" id="btn-patch" title="PATCH: Update part of a post">PATCH</button>
                        <button class="btn btn-secondary" id="btn-head" title="HEAD: Get headers for a post">HEAD</button>
                        <button class="btn btn-dark" id="btn-options" title="OPTIONS: List allowed methods">OPTIONS</button>
                    </div>
                    <div class="mt-2">
                        <label>Curl Example:</label>
                    <pre id="curl-example" class="bg-light p-2"></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" data-intro="This panel shows the response from the server, including status, headers, and body.">
                <div class="card-header">Response</div>
                <div class="card-body">
                    <div id="response-status"></div>
                    <div id="response-details"></div>
                    <div id="status-explanation" class="text-info mt-2"></div>
                </div>
            </div>
            <div class="card mt-3" data-intro="This is your request/response history. Click an item to review it.">
                <div class="card-header">History</div>
                <div class="card-body">
                    <ul id="history-list" class="list-group"></ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mb-3">
        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#codeComparison" aria-expanded="false" aria-controls="codeComparison">
            Show Laravel Route & Controller Code Example
        </button>
        <div class="collapse mt-2" id="codeComparison">
            <div class="card card-body">
<strong>Route Example:</strong>
<pre><code class="language-php">Route::post('posts', [PostController::class, 'store']);
Route::get('posts', [PostController::class, 'index']);
Route::put('posts/{post}', [PostController::class, 'update']);
Route::patch('posts/{post}', [PostController::class, 'patch']);
Route::delete('posts/{post}', [PostController::class, 'destroy']);
</code></pre>
<strong>Controller Example:</strong>
<pre><code class="language-php">public function store(Request $request) {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);
    $post = Post::create($validated);
    return response()->json($post, 201);
}
</code></pre>
            </div>
        </div>
    </div>
    <h2>Posts Table</h2>
    <table class="table" aria-label="Posts Table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody id="posts-table">
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Glossary Modal -->
<div class="modal fade" id="glossaryModal" tabindex="-1" aria-labelledby="glossaryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="glossaryModalLabel">Glossary / FAQ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <dl>
          <dt>HTTP</dt>
          <dd>HyperText Transfer Protocol, the foundation of data communication for the web.</dd>
          <dt>REST</dt>
          <dd>Representational State Transfer, an architectural style for designing APIs.</dd>
          <dt>GET</dt>
          <dd>Retrieve data from the server.</dd>
          <dt>POST</dt>
          <dd>Create a new resource on the server.</dd>
          <dt>PUT</dt>
          <dd>Replace an existing resource with new data.</dd>
          <dt>PATCH</dt>
          <dd>Update part of an existing resource.</dd>
          <dt>DELETE</dt>
          <dd>Remove a resource from the server.</dd>
          <dt>HEAD</dt>
          <dd>Retrieve headers for a resource, without the body.</dd>
          <dt>OPTIONS</dt>
          <dd>Discover which HTTP methods are supported by the server for a resource.</dd>
          <dt>Resource</dt>
          <dd>A data object or entity, such as a post or user, that can be created, read, updated, or deleted.</dd>
          <dt>Endpoint</dt>
          <dd>A specific URL where an API can be accessed by a client application.</dd>
        </dl>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intro.js/minified/introjs.min.css">
<script src="https://cdn.jsdelivr.net/npm/intro.js/minified/intro.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Attach HTTP method button listeners
    document.getElementById('btn-get').onclick = httpGet;
    document.getElementById('btn-post').onclick = httpPost;
    document.getElementById('btn-put').onclick = httpPut;
    document.getElementById('btn-delete').onclick = httpDelete;
    document.getElementById('btn-patch').onclick = httpPatch;
    document.getElementById('btn-head').onclick = httpHead;
    document.getElementById('btn-options').onclick = httpOptions;
// Helper functions for status explanations and curl
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

let history = [];
function updateHistory(req, res) {
    history.unshift({req, res});
    if (history.length > 10) history.pop();
    const list = document.getElementById('history-list');
    list.innerHTML = '';
    history.forEach((h, i) => {
        const li = document.createElement('li');
        li.className = 'list-group-item';
        li.innerText = `${h.req.method.toUpperCase()} ${h.req.url} → ${h.res.status || ''}`;
        li.onclick = () => showResponse(h.res, h.req, false);
        list.appendChild(li);
    });
}

function showResponse(res, reqConfig = null, addToHistory = true) {
    // Request details
    if (reqConfig) {
        document.getElementById('request-details').innerText = `${reqConfig.method.toUpperCase()} ${reqConfig.url}\nHeaders: ${JSON.stringify(reqConfig.headers || {}, null, 2)}\nBody: ${reqConfig.data ? JSON.stringify(reqConfig.data, null, 2) : ''}`;
        document.getElementById('curl-example').innerText = curlForRequest(reqConfig);
    }
    // Response details
    let status = res && res.status ? res.status : '';
    let statusText = res && res.statusText ? res.statusText : '';
    document.getElementById('response-status').innerHTML = status ? `<span class='fw-bold ${status >= 400 ? 'text-danger' : 'text-success'}'>${status} ${statusText}</span>` : '';
    document.getElementById('response-details').innerText = res && res.data !== undefined ? JSON.stringify(res.data, null, 2) : JSON.stringify(res, null, 2);
    document.getElementById('status-explanation').innerText = getStatusExplanation(status);
    if (addToHistory && reqConfig) updateHistory(reqConfig, res);
    // Visual feedback
    document.getElementById('response-status').className = status >= 400 ? 'text-danger' : 'text-success';
    // Update posts table if resource was changed
    if ([200,201,204].includes(status) && ['post','put','patch','delete'].includes((reqConfig?.method||'').toLowerCase())) {
        refreshPostsTable();
    }
    // Progress tracking for scenario tasks
    if (addToHistory && reqConfig && status >= 200 && status < 300) {
        if (reqConfig.method === 'post') markTask('create');
        if (reqConfig.method === 'get') markTask('read');
        if (reqConfig.method === 'put' || reqConfig.method === 'patch') markTask('update');
        if (reqConfig.method === 'delete') markTask('delete');
    }
}

// Persistent progress tracking for scenario tasks
function markTask(task) {
    const el = document.getElementById('task-' + task);
    if (el && !el.classList.contains('completed')) {
        el.classList.add('completed');
        el.querySelector('input[type=checkbox]').checked = true;
        updateScenarioProgress();
        saveProgress();
    }
}
function updateScenarioProgress() {
    const tasks = ['create','read','update','delete'];
    let completed = 0;
    tasks.forEach(t => {
        if (document.getElementById('task-' + t).classList.contains('completed')) completed++;
    });
    const percent = Math.round((completed / tasks.length) * 100);
    const bar = document.getElementById('scenario-progress');
    bar.style.width = percent + '%';
    bar.innerText = percent + '%';
    saveProgress();
}
function saveProgress() {
    const tasks = ['create','read','update','delete'];
    const state = tasks.map(t => document.getElementById('task-' + t).classList.contains('completed'));
    localStorage.setItem('httpDemoProgress', JSON.stringify(state));
}
function loadProgress() {
    const tasks = ['create','read','update','delete'];
    const state = JSON.parse(localStorage.getItem('httpDemoProgress') || '[false,false,false,false]');
    tasks.forEach((t, i) => {
        if (state[i]) {
            const el = document.getElementById('task-' + t);
            el.classList.add('completed');
            el.querySelector('input[type=checkbox]').checked = true;
        }
    });
    updateScenarioProgress();
}
window.addEventListener('DOMContentLoaded', loadProgress);

function clearProgress() {
    const tasks = ['create','read','update','delete'];
    tasks.forEach(t => {
        const el = document.getElementById('task-' + t);
        el.classList.remove('completed');
        el.querySelector('input[type=checkbox]').checked = false;
    });
    // Reset progress bar
    const bar = document.getElementById('scenario-progress');
    bar.style.width = '0%';
    bar.innerText = '0%';
    // Remove from localStorage
    localStorage.removeItem('httpDemoProgress');
}

function getCustomHeaders() {
    let headers = {};
    try {
        const val = document.getElementById('custom-headers').value;
        if (val) headers = JSON.parse(val);
    } catch (e) {}
    return headers;
}

function validateFields(fields) {
    let valid = true;
    if (fields.includes('title')) {
        const title = document.getElementById('title').value.trim();
        if (!title) {
            document.getElementById('title').classList.add('is-invalid');
            document.getElementById('title-error').innerText = 'Title is required.';
            valid = false;
        } else {
            document.getElementById('title').classList.remove('is-invalid');
            document.getElementById('title-error').innerText = '';
        }
    }
    if (fields.includes('content')) {
        const content = document.getElementById('content').value.trim();
        if (!content) {
            document.getElementById('content').classList.add('is-invalid');
            document.getElementById('content-error').innerText = 'Content is required.';
            valid = false;
        } else {
            document.getElementById('content').classList.remove('is-invalid');
            document.getElementById('content-error').innerText = '';
        }
    }
    return valid;
}

function httpGet() {
    const config = { method: 'get', url: '/posts', headers: getCustomHeaders() };
    axios.get('/posts', { headers: config.headers })
        .then(r => showResponse(r, config))
        .catch(e => showResponse(e.response || e, config));
}
function httpPost() {
    if (!validateFields(['title', 'content'])) return;
    const data = {title: document.getElementById('title').value, content: document.getElementById('content').value};
    const config = { method: 'post', url: '/posts', data, headers: getCustomHeaders() };
    axios.post('/posts', data, { headers: config.headers })
        .then(r => showResponse(r, config))
        .catch(e => showResponse(e.response || e, config));
}
function httpPut() {
    const id = prompt('Enter Post ID to update:');
    if (!validateFields(['title', 'content'])) return;
    const data = {title: document.getElementById('title').value, content: document.getElementById('content').value};
    const config = { method: 'put', url: `/posts/${id}`, data, headers: getCustomHeaders() };
    axios.put(`/posts/${id}`, data, { headers: config.headers })
        .then(r => showResponse(r, config))
        .catch(e => showResponse(e.response || e, config));
}
function httpDelete() {
    const id = prompt('Enter Post ID to delete:');
    const config = { method: 'delete', url: `/posts/${id}`, headers: getCustomHeaders() };
    axios.delete(`/posts/${id}`, { headers: config.headers })
        .then(r => showResponse(r, config))
        .catch(e => showResponse(e.response || e, config));
}
function httpPatch() {
    const id = prompt('Enter Post ID to patch:');
    if (!validateFields(['title'])) return;
    const data = {title: document.getElementById('title').value};
    const config = { method: 'patch', url: `/posts/${id}`, data, headers: getCustomHeaders() };
    axios.patch(`/posts/${id}`, data, { headers: config.headers })
        .then(r => showResponse(r, config))
        .catch(e => showResponse(e.response || e, config));
}
function httpHead() {
    const id = prompt('Enter Post ID for HEAD:');
    const config = { method: 'head', url: `/posts/${id}`, headers: getCustomHeaders() };
    axios.head(`/posts/${id}`, { headers: config.headers })
        .then(r => showResponse(r, config))
        .catch(e => showResponse(e.response || e, config));
}
function httpOptions() {
    const config = { method: 'options', url: '/posts', headers: getCustomHeaders() };
    axios.options('/posts', { headers: config.headers })
        .then(r => showResponse(r, config))
        .catch(e => showResponse(e.response || e, config));
}

function refreshPostsTable() {
    axios.get('/posts').then(r => {
        let posts = r.data;
        // If posts is not an array, try to recover or show empty
        if (!Array.isArray(posts)) {
            // Try to extract posts if wrapped in an object
            if (posts && Array.isArray(posts.data)) {
                posts = posts.data;
            } else {
                posts = [];
            }
        }
        const tbody = document.getElementById('posts-table');
        tbody.innerHTML = '';
        posts.forEach(post => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${post.id}</td><td>${post.title}</td><td>${post.content}</td>`;
            tbody.appendChild(tr);
        });
    });
}
document.getElementById('start-tour').onclick = function() {
    introJs().setOptions({
        steps: [
            { intro: "Welcome to the HTTP Methods Demo! Let's take a quick tour." },
            { element: document.querySelector('.card[data-intro]'), intro: "This panel shows the request details. You can enter data and try different HTTP methods." },
            { element: document.getElementById('title'), intro: "Enter a title for your post here." },
            { element: document.getElementById('content'), intro: "Enter content for your post here." },
            { element: document.getElementById('custom-headers'), intro: "You can add custom headers in JSON format." },
            { element: document.querySelector('.btn-group.mb-2'), intro: "Try each HTTP method by clicking these buttons. Hover for a description." },
            { element: document.getElementById('curl-example'), intro: "This is the curl command for the current request." },
            { element: document.querySelectorAll('.card[data-intro]')[1], intro: "This panel shows the response from the server, including status, headers, and body." },
            { element: document.querySelectorAll('.card[data-intro]')[2], intro: "This is your request/response history. Click an item to review it." },
        ]
    }).start();
};
document.getElementById('open-glossary').onclick = function() {
    var modal = new bootstrap.Modal(document.getElementById('glossaryModal'));
    modal.show();
};
(function() {
    const btn = document.getElementById('toggle-dark');
    btn.onclick = function() {
        document.body.classList.toggle('bg-dark');
        document.body.classList.toggle('text-light');
        // Toggle for cards and tables
        document.querySelectorAll('.card, .table').forEach(el => {
            el.classList.toggle('bg-dark');
            el.classList.toggle('text-light');
            el.classList.toggle('table-dark');
        });
        // Toggle for accordion
        document.querySelectorAll('.accordion, .accordion-item, .accordion-header, .accordion-button, .accordion-body').forEach(el => {
            el.classList.toggle('bg-dark');
            el.classList.toggle('text-light');
        });
    };
})();
document.getElementById('reset-demo').onclick = function() {
    if (confirm('Are you sure you want to reset the demo data? This will remove all posts and create sample ones.')) {
        axios.post('/posts/reset-demo').then(() => {
            refreshPostsTable();
            clearProgress();
            alert('Demo data has been reset!');
        });
    }
};
// Keyboard accessibility for buttons
['start-tour','open-glossary','toggle-dark','reset-demo'].forEach(id => {
    const btn = document.getElementById(id);
    if (btn) {
        btn.addEventListener('keyup', function(e) {
            if (e.key === 'Enter' || e.key === ' ') btn.click();
        });
    }
});
});
</script>
@endsection
