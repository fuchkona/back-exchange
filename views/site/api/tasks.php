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
                                "currentStatus": {
                                "id": 1,
                                "title": "Новая задача"
                                },
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
                                "currentStatus": {
                                "id": 1,
                                "title": "Новая задача"
                                },
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
                                "currentStatus": {
                                "id": 2,
                                "title": "В работе"
                                },
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
                                "currentStatus": {
                                "id": 1,
                                "title": "Новая задача"
                                },
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
                                {
                                "success": true,
                                "data": {
                                "id": "{task id}"
                                }
                                }
                            </code>
                        </p>
                        <p><b>Error:</b>
                            <code style="white-space: pre-line">
                                {
                                "success": false,
                                "data": [
                                {
                                "name": "Not Found",
                                "message": "Task is not found.",
                                "code": 0,
                                "status": 404,
                                "type": "yii\\web\\NotFoundHttpException"
                                },
                                {
                                "name": "Conflict",
                                "message": "You can not delete this task. You are not owner of this task!",
                                "code": 0,
                                "status": 409,
                                "type": "yii\\web\\ConflictHttpException"
                                },
                                {
                                "name": "Conflict",
                                "message": "You can not delete this task. It has worker!",
                                "code": 0,
                                "status": 409,
                                "type": "yii\\web\\ConflictHttpException"
                                },
                                {
                                "name": "Conflict",
                                "message": "Задача должна быть в статусе новой!",
                                "code": 0,
                                "status": 409,
                                "type": "yii\\web\\ConflictHttpException"
                                }
                                ]
                                }
                            </code>
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <button class="btn btn-link" data-toggle="collapse" data-target="#acceptTaskRequest">
                    <b>Accept task request</b> - Accept request
                </button>
                <div id="acceptTaskRequest" class="collapse panel panel-primary">
                    <div class="panel-body">
                        <p><b>Route:</b> /api/task/accept-request</p>
                        <p><b>Method:</b> POST</p>
                        <p><b>Params:</b> task_id, request_id</p>
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
                                "data": [
                                {
                                "name": "Conflict",
                                "message": "Вы не являетесь владельцем данной задачи!",
                                "code": 0,
                                "status": 409,
                                "type": "yii\\web\\ConflictHttpException"
                                },
                                "data": {
                                "name": "Conflict",
                                "message": "Задача должна быть в статусе новой!",
                                "code": 0,
                                "status": 409,
                                "type": "yii\\web\\ConflictHttpException"
                                }
                                ]
                                }
                            </code>
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <button class="btn btn-link" data-toggle="collapse" data-target="#sendForReview">
                    <b>Send for review</b> - send work results for review
                </button>
                <div id="sendForReview" class="collapse panel panel-primary">
                    <div class="panel-body">
                        <p><b>Route:</b> /api/task/send-for-review</p>
                        <p><b>Method:</b> POST</p>
                        <p><b>Params:</b> task_id</p>
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
                                "data": [
                                {
                                "name": "Conflict",
                                "message": "Вы не являетесь исполнителем данной задачи!",
                                "code": 0,
                                "status": 409,
                                "type": "yii\\web\\ConflictHttpException"
                                },
                                {
                                "name": "Conflict",
                                "message": "Задача должна иметь статус: \"В работе\"!",
                                "code": 0,
                                "status": 409,
                                "type": "yii\\web\\ConflictHttpException"
                                }
                                ]
                            </code>
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <button class="btn btn-link" data-toggle="collapse" data-target="#confirmExecution">
                    <b>Confirm task execution</b> - confirm task execution
                </button>
                <div id="confirmExecution" class="collapse panel panel-primary">
                    <div class="panel-body">
                        <p><b>Route:</b> /api/task/confirm-execution</p>
                        <p><b>Method:</b> POST</p>
                        <p><b>Params:</b> task_id</p>
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
                                "data": [
                                {
                                "name": "Conflict",
                                "message": "Вы не являетесь владельцем данной задачи!",
                                "code": 0,
                                "status": 409,
                                "type": "yii\\web\\ConflictHttpException"
                                },
                                {
                                "name": "Conflict",
                                "message": "Задача должна иметь статус: \"Отправлена исполнителем на проверку\"!",
                                "code": 0,
                                "status": 409,
                                "type": "yii\\web\\ConflictHttpException"
                                }
                                ]
                                }
                            </code>
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <button class="btn btn-link" data-toggle="collapse" data-target="#denyExecution">
                    <b>Deny task execution</b> - deny task execution
                </button>
                <div id="denyExecution" class="collapse panel panel-primary">
                    <div class="panel-body">
                        <p><b>Route:</b> /api/task/deny-execution</p>
                        <p><b>Method:</b> POST</p>
                        <p><b>Params:</b> task_id</p>
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
                                "data": [
                                {
                                "name": "Conflict",
                                "message": "Вы не являетесь владельцем данной задачи!",
                                "code": 0,
                                "status": 409,
                                "type": "yii\\web\\ConflictHttpException"
                                },
                                {
                                "name": "Conflict",
                                "message": "Задача должна иметь статус: \"Отправлена исполнителем на проверку\"!",
                                "code": 0,
                                "status": 409,
                                "type": "yii\\web\\ConflictHttpException"
                                }
                                ]
                                }
                            </code>
                        </p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>