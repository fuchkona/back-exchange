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