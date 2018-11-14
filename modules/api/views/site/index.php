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
                        <b>Get tasks</b>
                    </button>
                    <div id="getTask" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/tasks</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Form data:</b> page, per-page</p>
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
                                    "time": time,
                                    "status": status,
                                    "created_at": created at,
                                    "updated_at": updated_at
                                    },
                                    "worker": {
                                    "id": 1,
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email",
                                    "time": time,
                                    "status": status,
                                    "created_at": created at,
                                    "updated_at": updated_at
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
            </ul>
        </div>
    </div>
</div>
