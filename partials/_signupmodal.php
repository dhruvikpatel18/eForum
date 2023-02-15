<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupmodalLabel">Signup for an eDiscuss Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/eForum/partials/_handleSignup.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email id</label>
                        <input required type="email" class="form-control" id="signupEmail" aria-describedby="emailHelp"
                            name="signupEmail">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input minlength="8" maxlength="16" alphabet="A-Za-z0-9+_%@!$*~-"
                            requiredclasses="[A-Z] [a-z] [0-9] [+_%@!$*~-]" requiredclasscount="3"
                            disallowedwords="{{username}}" required type="password" class="form-control"
                            id="signupPassword" name="signupPassword">
                    </div>
                    <div class=" mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input required type="password" class="form-control" id="signupcPassword "
                            name="signupcPassword">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>