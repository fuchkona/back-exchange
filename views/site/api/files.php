<div class="panel panel-default">
    <div class="panel-heading">FileController</div>
    <div class="panel-body">
        <p><b>Route:</b> /api/files/</p>
        <p><b>Actions:</b></p>
        <ul>
            <li>
                <button class="btn btn-link" data-toggle="collapse" data-target="#getFile">
                    <b>Get fil</b> - getting file by id with or without pagination
                </button>
                <div id="getFiles" class="collapse panel panel-primary">
                    <div class="panel-body">
                        <p><b>Route:</b> /api/file/load-file</p>
                        <p><b>Method:</b> get</p>
                        <p><b>Params:</b> id / optional params: page, per-page
                        </p>
                        <p><b>Success:</b>
                            <code style="white-space: pre-line">
                                {
                                "success": true,
                                "data":
                                {
                                "id": 1,
                                "task_id": 9,
                                "user_id": 1,
                                "filename": "1543780600.pdf",
                                "url": "http://back-exchange.test/api/file/load-file?id=1",
                                "display_name": "Test file",
                                "description": ""
                                }
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
                <button class="btn btn-link" data-toggle="collapse" data-target="#getFiles">
                    <b>Get my files</b> - getting files by authorised user with or without pagination
                </button>
                <div id="getFiles" class="collapse panel panel-primary">
                    <div class="panel-body">
                        <p><b>Route:</b> /api/file/my-files</p>
                        <p><b>Method:</b> get</p>
                        <p><b>Params:</b>  optional params: page, per-page
                        </p>
                        <p><b>Success:</b>
                            <code style="white-space: pre-line">
                                {
                                "success": true,
                                "data": [
                                {
                                "id": 1,
                                "task_id": 9,
                                "user_id": 1,
                                "filename": "1543780600.pdf",
                                "url": "http://back-exchange.test/api/file/load-file?id=1",
                                "display_name": "Test file",
                                "description": ""
                                },
                                ...
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
                <button class="btn btn-link" data-toggle="collapse" data-target="#getFilesTask">
                    <b>Get files by task</b> - getting files by task with or without pagination
                </button>
                <div id="getFilesTask" class="collapse panel panel-primary">
                    <div class="panel-body">
                        <p><b>Route:</b> /api/file/files-by-task</p>
                        <p><b>Method:</b> get</p>
                        <p><b>Params:</b> task)id / optional params: page, per-page
                        </p>
                        <p><b>Success:</b>
                            <code style="white-space: pre-line">
                                {
                                "success": true,
                                "data": [
                                {
                                "id": 1,
                                "task_id": 9,
                                "user_id": 1,
                                "filename": "1543780600.pdf",
                                "url": "http://back-exchange.test/api/file/load-file?id=1",
                                "display_name": "Test file",
                                "description": ""
                                },
                                ...
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
                <button class="btn btn-link" data-toggle="collapse" data-target="#createFile">
                    <b>Create file</b> - Create file
                </button>
                <div id="createFile" class="collapse panel panel-primary">
                    <div class="panel-body">
                        <p><b>Route:</b> /api/file/create</p>
                        <p><b>Method:</b> post</p>
                        <p><b>Form data:</b>task_id, user_id, file</p>
                        <p><b>Success:</b>
                            <code style="white-space: pre-line">
                                {
                                "success": true,
                                "data": {
                                "id": 6,
                                "task_id": "1",
                                "user_id": "1",
                                "filename": "1544720425.pdf",
                                "url": "http://back-exchange.test/api/file/load-file?id=6",
                                "display_name": "Опись",
                                "description": null
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
                                "field": "filename",
                                "message": "Filename cannot be blank."
                                },
                                {
                                "field": "file",
                                "message": "File cannot be blank."
                                }
                                ]
                                }
                            </code>
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <button class="btn btn-link" data-toggle="collapse" data-target="#deleteFile">
                    <b>Delete file</b> - Deleting file by file id. Notice: the file can be deleted only
                    by the author.
                </button>
                <div id="deleteFile" class="collapse panel panel-primary">
                    <div class="panel-body">
                        <p><b>Route:</b> /api/file/delete</p>
                        <p><b>Method:</b> delete</p>
                        <p><b>Params:</b> file_id</p>
                        <p><b>Success:</b>
                            <code style="white-space: pre-line">
                                "success": true,
                                "data": [
                                    id: file_id
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