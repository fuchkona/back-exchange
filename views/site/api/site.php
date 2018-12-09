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