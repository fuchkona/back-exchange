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
            <p>Actions</p>
            <ul>
                <li>
                    <p><b>Login</b></p>
                    <p><b>Route:</b> /api/site/login</p>
                    <p><b>Method:</b> post</p>
                    <p><b>Form data:</b> username, password</p>
                    <p><b>Success:</b>
                    <pre>{
    "username": "username",
    "full_name": "display name",
    "email": "email@email.ru",
    "token": "some_token"
}</pre>
                    </p>
                    <p><b>Error:</b>
                    <pre>[
    {
        "field": "username",
        "message": "Username cannot be blank."
    },
    {
        "field": "password",
        "message": "Password cannot be blank."
    }
]</pre>
                    </p>
                </li>
                <li>
                    <p><b>Login test</b></p>
                    <p><b>Route:</b> /api/site/login-test</p>
                    <p><b>Method:</b> get</p>
                    <p><b>Auth:</b> OAuth 2.0, Bearer Token</p>
                    <p><b>Success:</b>
                    <pre>"Authorisation was successful"</pre>
                    </p>
                    <p><b>Error:</b>
                    <pre>Unauthorized (#401)</pre>
                    </p>
                </li>
            </ul>
        </div>
    </div>
</div>
