<div class="restApi-default-index">
    <div class="jumbotron">
        <h1>Welcome to api page!</h1>
        <p>Soon you will se here all allowed api</p>
    </div>
    <hr>
    <div class="panel panel-default">
        <div class="panel-heading">SiteController</div>
        <div class="panel-body">
            <p><b>Route:</b> /api/site/</p>
            <p><b>Actions:</b></p>
            <ul>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#login">
                        <b>Login</b> - login user to get token
                    </button>
                    <div id="login" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/site/login</p>
                            <p><b>Method:</b> post</p>
                            <p><b>Form data:</b> username, password</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email@email.ru",
                                    "token": "some_token"
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    [
                                    {
                                    "field": "username",
                                    "message": "Username cannot be blank."
                                    },
                                    {
                                    "field": "password",
                                    "message": "Password cannot be blank."
                                    }
                                    ]</code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#login-test">
                        <b>Login test</b> - check if token works
                    </button>
                    <div id="login-test" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/site/login-test</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Auth:</b> OAuth 2.0, Bearer Token</p>
                            <p><b>Success:</b>
                                <code>"Authorisation was successful! User: {username}"</code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "name": "Unauthorized",
                                    "message": "Your request was made with invalid credentials.",
                                    "code": 0,
                                    "status": 401,
                                    "type": "yii\\web\\UnauthorizedHttpException"
                                    }
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#signup">
                        <b>Signup</b> - registration new user and getting token
                    </button>
                    <div id="signup" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/site/signup</p>
                            <p><b>Method:</b> post</p>
                            <p><b>Form data:</b> username, full_name, email, password</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email@email.ru",
                                    "token": "some_token"
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    [
                                    {
                                    "field": "username",
                                    "message": "Username cannot be blank."
                                    },
                                    {
                                    "field": "full_name",
                                    "message": "Full Name cannot be blank."
                                    },
                                    {
                                    "field": "email",
                                    "message": "Email cannot be blank."
                                    },
                                    {
                                    "field": "password",
                                    "message": "Password cannot be blank."
                                    }
                                    ]
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#getTask">
                        <b>Get tasks</b> - getting tasks with or without pagination
                    </button>
                    <div id="getTask" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/tasks</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Form data:</b> without params for getting all tasks / with params for pagination: page, per-page</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    [
                                    {
                                    "id": 1,
                                    "title": "title task",
                                    "description": "description task",
                                    "contract_time": contract time,
                                    "deadline": deadline,
                                    "created_at": created at,
                                    "updated_at": updated at,
                                    "owner": {
                                    "id": 1,
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email",
                                    },
                                    "worker": {
                                    "id": 1,
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email",
                                    }
                                    },
                                    {(another task)},
                                    {(another task)}
                                    ]

                                    owners and worker extra_field:
                                    {
                                        "time": time,
                                        "status": status,
                                        "created_at": created at,
                                        "update_at": updated at
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "name": "Not Found",
                                    "message": "Page not found.",
                                    "code": 0,
                                    "status": 404,
                                    "type": "yii\\web\\NotFoundHttpException",
                                    "previous": {
                                    "name": "Invalid Route",
                                    "message": "Unable to resolve the request \"api/tasksf\".",
                                    "code": 0,
                                    "type": "yii\\base\\InvalidRouteException"
                                    }
                                    }
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#getOneTask">
                        <b>Get one task</b> - Getting one task by task id
                    </button>
                    <div id="getOneTask" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/tasks/{id task}</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Form data:</b> </p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "id": 1,
                                    "title": "title task",
                                    "description": "description task",
                                    "contract_time": contract time,
                                    "deadline": deadline,
                                    "created_at": created at,
                                    "updated_at": updated at,
                                    "owner": {
                                    "id": 1,
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email",
                                    },
                                    "worker": {
                                    "id": 1,
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email",
                                    }
                                    }

                                    owners and worker extra_field:
                                    {
                                    "time": time,
                                    "status": status,
                                    "created_at": created at,
                                    "update_at": updated at
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "name": "Not Found",
                                    "message": "Object not found: 55",
                                    "code": 0,
                                    "status": 404,
                                    "type": "yii\\web\\NotFoundHttpException"
                                    }
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#createTask">
                        <b>Create task</b> - Creating task
                    </button>
                    <div id="createTask" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/task/create</p>
                            <p><b>Method:</b> post</p>
                            <p><b>Form data:</b> title, description, contract time, owner_id, deadline</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "id": 1,
                                    "title": "title task",
                                    "description": "description task",
                                    "contract_time": contract time,
                                    "deadline": deadline,
                                    "created_at": created at,
                                    "updated_at": updated at,
                                    "owner": {
                                    "id": 1,
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email",
                                    },
                                    "worker": null
                                    }

                                    owners and worker extra_field:
                                    {
                                    "time": time,
                                    "status": status,
                                    "created_at": created at,
                                    "update_at": updated at
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    [
                                    {"field":"title","message":"Title cannot be blank."},
                                    {"field":"description","message":"Description cannot be blank."},
                                    {"field":"owner_id","message":"Owner ID cannot be blank."},
                                    {"field":"deadline","message":"Deadline cannot be blank."}
                                    ]
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#deleteTask">
                        <b>Delete task</b> - Deleting task by task id
                    </button>
                    <div id="deleteTask" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/task/delete</p>
                            <p><b>Method:</b> delete</p>
                            <p><b>Form data:</b> task_id</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    {
                                        "result": "success"
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "name":"Not Found",
                                    "message":"Task is not found",
                                    "code":0,
                                    "status":404,
                                    "type":"yii\\web\\NotFoundHttpException"
                                    }
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
