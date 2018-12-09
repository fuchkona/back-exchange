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