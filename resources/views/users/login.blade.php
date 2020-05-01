
                <form action="{{URL::to('/login-check')}}" method="get">
                    <div class="form-group">
                      <input id="email_modal" name="email_account" type="text" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                      <input id="password_modal"name="password_account" type="password" placeholder="password" class="form-control">
                    </div>
                    <p class="text-center">
                      <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                    </p>
                </form>