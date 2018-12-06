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