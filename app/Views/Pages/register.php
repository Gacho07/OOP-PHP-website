<div class="col-lg-6 py-5 mx-auto mb-4 mt-4">
    <div id="register-form">
        <form class="form-horizontal">
            <fieldset>
                <div id="legend">
                    <legend class="">
                        <h2 class="py-2">Register</h2>
                    </legend>
                </div>
                <div class="control-group">

                    <div class="form-group">
                        <input type="text" id="tbFirstName" class="form-control" name="first_name">
                        <p class="help-block">First Name length must be at least 2 letters</p>
                    </div>
                </div>
                <div class="control-group">

                    <div class="form-group">
                        <input type="text" id="tbLastName" class="form-control" name="last_name">
                        <p class="help-block">Last Name length must be at least 2 letters</p>
                    </div>
                </div>
                <div class="control-group">

                    <div class="form-group">
                        <input type="text" id="tbEmail" class="form-control" name="email">
                        <p class="help-block">Email must be valid</p>
                    </div>
                </div>
                <div class="control-group">

                    <div class="form-group">
                        <input type="text" id="tbPassword" class="form-control" name="password">
                        <p class="help-block">Password must contain at least one uppercase, lowercase and number. Length at least 8 characters</p>
                    </div>
                </div>


                <div class="control-group">
                    <div class="controls">
                        <button class="btn btn-success" type="button" id="btnRegister" name="btnRegister">Register</button>
                    </div>
                    <div id="feedback" class="text-danger mt-4"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>