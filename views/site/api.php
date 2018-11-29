<div class="restApi-default-index">
    <div class="jumbotron">
        <h1>Welcome to api page!</h1>
        <p>Here you can see all allowed api</p>
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
                                    "success": true,
                                    "data: {
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email@email.ru",
                                    "token": "some_token"
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    "success": false,
                                    "data: [
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
                    <button class="btn btn-link" data-toggle="collapse" data-target="#logout">
                        <b>Logout</b> - reset token
                    </button>
                    <div id="logout" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/site/logout</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Auth:</b> OAuth 2.0, Bearer Token</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "success": true,
                                    "data": true
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "success": false,
                                    "data": {
                                    "name": "Unauthorized",
                                    "message": "Your request was made with invalid credentials.",
                                    "code": 0,
                                    "status": 401,
                                    "type": "yii\\web\\UnauthorizedHttpException"
                                    }
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
                                    "success": true,
                                    "data: {
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email@email.ru",
                                    "token": "some_token"
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    "success": false,
                                    "data: [
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
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">TaskController</div>
        <div class="panel-body">
            <p><b>Route:</b> /api/tasks/</p>
            <p><b>Actions:</b></p>
            <ul>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#getTask">
                        <b>Get tasks</b> - getting tasks with or without pagination
                    </button>
                    <div id="getTask" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/tasks</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Form data:</b> without params for getting all tasks / with params for pagination:
                                page, per-page</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    "success": true,
                                    "data: [
                                    {
                                    "id": task_id,
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
                                    "id": user_id,
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
                                    "success": false,
                                    "data: {
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
                    <button class="btn btn-link" data-toggle="collapse" data-target="#getTasksByWorker">
                        <b>Get tasks by worker</b> - getting all workers tasks with or without pagination
                    </button>
                    <div id="getTasksByWorker" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/task/by-worker/{worker_id}</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Form data:</b> without params for getting all tasks / with params for pagination:
                                page, per-page</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "success": true,
                                    "data": [
                                    {
                                    "id": 1,
                                    "title": "Test",
                                    "description": "Test task",
                                    "contract_time": 0,
                                    "deadline": 1,
                                    "created_at": 1542818074,
                                    "updated_at": 1542818074,
                                    "owner": {
                                    "id": 1,
                                    "username": "nikita",
                                    "full_name": "Fuchko N.A.",
                                    "email": "fuchko.nikita@gmail.com"
                                    },
                                    "worker": {
                                    "id": 1,
                                    "username": "nikita",
                                    "full_name": "Fuchko N.A.",
                                    "email": "fuchko.nikita@gmail.com"
                                    }
                                    }
                                    ]
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "success": false,
                                    "data": {
                                    "name": "Bad Request",
                                    "message": "Missing required parameters: worker_id",
                                    "code": 0,
                                    "status": 400,
                                    "type": "yii\\web\\BadRequestHttpException"
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
                            <p><b>Form data:</b></p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    "success": true,
                                    "data: {
                                    "id": task_id,
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
                                    "id": user_id,
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
                                    "success": false,
                                    "data: {
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
                                    "success": true,
                                    "data: {
                                    "id": task_id,
                                    "title": "title task",
                                    "description": "description task",
                                    "contract_time": contract time,
                                    "deadline": deadline,
                                    "created_at": created at,
                                    "updated_at": updated at,
                                    "owner": {
                                    "id": user_id,
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
                                    "success": false,
                                    "data: [
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
                                    "success": true,
                                    "data: ["The task is removed"]
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    "success": false,
                                    "data: {
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

    <div class="panel panel-default">
        <div class="panel-heading">CommentController</div>
        <div class="panel-body">
            <p><b>Route:</b> /api/comments/</p>
            <p><b>Actions:</b></p>
            <ul>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#getComments">
                        <b>Get comments</b> - getting comments by task id with or without pagination
                    </button>
                    <div id="getComments" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/comment/by-task</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Params:</b> required params: task_id. / optional params: page, per-page
                            </p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    "success": true,
                                    "data": [
                                    {
                                    "id": 4,
                                    "author": {
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email",
                                    },
                                    "text": "comment_text",
                                    "created_at": created at,
                                    "updated_at": updated at
                                    },
                                    {another comment},
                                    {another comment},
                                    ]

                                    author extra_field:
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
                                    "success": false,
                                    "data": {
                                    "name": "Unauthorized",
                                    "message": "Your request was made with invalid credentials.",
                                    "code": 0,
                                    "status": 401,
                                    "type": "yii\\web\\UnauthorizedHttpException"
                                    }
                                    }
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#createComment">
                        <b>Create comment</b> - Create comment
                    </button>
                    <div id="createComment" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/comment/create</p>
                            <p><b>Method:</b> post</p>
                            <p><b>Form data:</b>task_id, author_id, text</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    "success": true,
                                    "data": {
                                    "id": 4,
                                    "author": {
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email",
                                    },
                                    "text": "comment_text",
                                    "created_at": created at,
                                    "updated_at": updated at
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    "success": false,
                                    "data": [
                                    {
                                    "field": "task_id",
                                    "message": "Task ID cannot be blank."
                                    },
                                    {
                                    "field": "author_id",
                                    "message": "Author ID cannot be blank."
                                    },
                                    {
                                    "field": "text",
                                    "message": "Text cannot be blank."
                                    }
                                    ]
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#deleteComment">
                        <b>Delete comment</b> - Deleting comment by comment id. Notice: the comment can be deleted only
                        by the author.
                    </button>
                    <div id="deleteComment" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/comment/delete</p>
                            <p><b>Method:</b> delete</p>
                            <p><b>Params:</b> comment_id</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    "success": true,
                                    "data": [
                                    "The comment is removed"
                                    ]
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    "success": false,
                                    "data": {
                                    "name": "Forbidden",
                                    "message": "You a not have permissions for this action",
                                    "code": 0,
                                    "status": 403,
                                    "type": "yii\\web\\ForbiddenHttpException"
                                    }
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">RequestController</div>
        <div class="panel-body">
            <p><b>Route:</b> /api/requests/</p>
            <p><b>Actions:</b></p>
            <ul>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#getRequests">
                        <b>Get requests</b> - getting requests by task id with or without pagination
                    </button>
                    <div id="getRequests" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/request/by-task</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Params:</b> required params: task_id. / optional params: page, per-page
                            </p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "success": true,
                                    "data": [
                                    {
                                    "id": {id},
                                    "task_id": {task id},
                                    "requester": {
                                    "id": {requester id},
                                    "username": {requester username},
                                    "full_name": {requester display name},
                                    "email": {requester email}
                                    },
                                    "need_time": {needed time to complete task}
                                    }
                                    ]
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "success": false,
                                    "data": {
                                    "name": "Unauthorized",
                                    "message": "Your request was made with invalid credentials.",
                                    "code": 0,
                                    "status": 401,
                                    "type": "yii\\web\\UnauthorizedHttpException"
                                    }
                                    }
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#createRequest">
                        <b>Create request</b> - Create request
                    </button>
                    <div id="createRequest" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/request/create</p>
                            <p><b>Method:</b> post</p>
                            <p><b>Form data:</b> task_id, requester_id, need_time</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    {
                                    "success": true,
                                    "data": {
                                    "id": {id},
                                    "task_id": {task id},
                                    "requester": {
                                    "id": {requester id},
                                    "username": {requester username},
                                    "full_name": {requester display name},
                                    "email": {requester email}
                                    },
                                    "need_time": {needed time to complete task}
                                    }
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">

                                </code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#deleteRequest">
                        <b>Delete request</b> - Deleting comment by comment id. Notice: the comment can be deleted only
                        by the author.
                    </button>
                    <div id="deleteRequest" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/request/delete</p>
                            <p><b>Method:</b> delete</p>
                            <p><b>Params:</b> request_id</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    "success": true,
                                    "data": [
                                    "The request is removed"
                                    ]
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    "success": false,
                                    "data": {
                                    "name": "Forbidden",
                                    "message": "You a not have permissions for this action",
                                    "code": 0,
                                    "status": 403,
                                    "type": "yii\\web\\ForbiddenHttpException"
                                    }
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">UserController</div>
        <div class="panel-body">
            <p><b>Route:</b> /api/user/</p>
            <p><b>Actions:</b></p>
            <ul>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#getUsers">
                        <b>Get all users </b> - getting users with or without pagination
                    </button>
                    <div id="getUsers" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/users/</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Form data:</b> without params for getting all users / with params for pagination:
                                page, per-page</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    "success": true,
                                    "data": [
                                    {
                                    "id": user_id,
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email"
                                    },
                                    {another user},
                                    {another user},
                                    ...
                                    ]
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    "success": false,
                                    "data: {
                                    "name": "Not Found",
                                    "message": "Page not found.",
                                    "code": 0,
                                    "status": 404,
                                    "type": "yii\\web\\NotFoundHttpException",
                                    "previous": {
                                    "name": "Invalid Route",
                                    "message": "Unable to resolve the request \"api/userK\".",
                                    "code": 0,
                                    "type": "yii\\base\\InvalidRouteException"
                                    }
                                </code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#viewUser">
                        <b>View user</b> - view user by user_id
                    </button>
                    <div id="viewUser" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/users/{user id}</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Form data:</b></p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    "success": true,
                                    "data": {
                                    "id": user_id,
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email"
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    "success": false,
                                    "data: {
                                    "name": "Not Found",
                                    "message": "Object not found: 5",
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
                    <button class="btn btn-link" data-toggle="collapse" data-target="#userProfile">
                        <b>View profile </b> - view authorized user profile
                    </button>
                    <div id="userProfile" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/user/profile</p>
                            <p><b>Method:</b> get</p>
                            <p><b>Form data:</b></p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    "success": true,
                                    "data": {
                                    "id": authorized_user_id,
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email"
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    "success": false,
                                    "data: {
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
                    <button class="btn btn-link" data-toggle="collapse" data-target="#updateProfile">
                        <b>Update profile </b> - update authorized user profile
                    </button>
                    <div id="updateProfile" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/user/update-profile</p>
                            <p><b>Method:</b> post</p>
                            <p><b>Form data:</b> 'username', 'full_name', 'email'</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    "success": true,
                                    "data": {
                                    "id": authorized_user_id,
                                    "username": "username",
                                    "full_name": "display name",
                                    "email": "email"
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    "success": false,
                                    "data: [
                                    {
                                    "name": "Unauthorized",
                                    "message": "Your request was made with invalid credentials.",
                                    "code": 0,
                                    "status": 401,
                                    "type": "yii\\web\\UnauthorizedHttpException"
                                    },
                                    {
                                    "field": "username",
                                    "message": "Username cannot be blank."
                                    },
                                    {
                                    "field": "full_name",
                                    "message": "Full name cannot be blank."
                                    },
                                    {
                                    "field": "email",
                                    "message": "Email cannot be blank."
                                    },
                                    {
                                    "field": "username",
                                    "message": "Username \"test\" has already been taken."
                                    },
                                    {
                                    "field": "email",
                                    "message": "Email \"test@example.com\" has already been taken."
                                    },
                                    {
                                    "field": "email",
                                    "message": "Email is not a valid email address."
                                    }
                                    ]</code>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#changePassword">
                        <b>Change Password </b> - change authorized user password
                    </button>
                    <div id="changePassword" class="collapse panel panel-primary">
                        <div class="panel-body">
                            <p><b>Route:</b> /api/user/change-pass</p>
                            <p><b>Method:</b> post</p>
                            <p><b>Form data:</b> 'currentPassword', 'newPassword', 'newPasswordRepeat'</p>
                            <p><b>Success:</b>
                                <code style="white-space: pre-line">
                                    "success": true,
                                    "data": {
                                    "oldPassword": "currentPassword",
                                    "newPassword": "newPassword"
                                    }
                                </code>
                            </p>
                            <p><b>Error:</b>
                                <code style="white-space: pre-line">
                                    "success": false,
                                    "data: [
                                    {
                                    "field": "currentPassword",
                                    "message": "User current password cannot be blank."
                                    },
                                    {
                                    "field": "newPassword",
                                    "message": "User new password cannot be blank."
                                    },
                                    {
                                    "field": "newPasswordRepeat",
                                    "message": "User new password cannot be blank."
                                    },
                                    {
                                    "field": "currentPassword",
                                    "message": "Incorrect password."
                                    },
                                    {
                                    "field": "newPassword",
                                    "message": "User new password should contain at least 6 characters."
                                    },
                                    {
                                    "field": "newPasswordRepeat",
                                    "message": "Passwords do not match"
                                    }
                                    ]</code>
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
