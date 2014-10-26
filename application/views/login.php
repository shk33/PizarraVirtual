<div class="container">

    <div class="row">
      <div class="span4 offset4 well">

        <legend>Please Sign In</legend>

        <?php if (isset($error) && $error): ?>
          <div class="alert alert-error">
            <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
          </div>
        <?php endif; ?>

        <?php echo form_open('login/login_user') ?>
        
        <!-- <input type="text" id="email" class="span4" name="email" placeholder="Email Address">-->
        <!-- <input type="password" id="password" class="span4" name="password" placeholder="Password"> -->
        <?php 
            $config = array(
              'name'        => 'email',
              'type'        => 'text',
              'class'       => 'form-control',
              'id'          => 'inputEmail',
              'placeholder' => 'Email Address',
              'value'       => set_value('email')
            );
            echo form_input($config); 
        ?>

        <?php 
            $config = array(
              'name'        => 'password',
              'type'        => 'password',
              'class'       => 'form-control',
              'id'          => 'inputPassword',
              'placeholder' => 'Email Address'
            );
            echo form_input($config); 
        ?>

        <!--<label class="checkbox">
          <input type="checkbox" name="remember" value="1"> Remember Me
        </label>-->

        <button type="submit" name="submit" class="btn btn-info btn-block">Sign in</button>
        <?php echo form_close() ?>

        </form>
      </div>
    </div>

    <div class="row">
      <div class="span6 offset4">
        <p><strong>Admin user email:</strong> admin@example.com</p>
        <p><strong>Team 1 user email:</strong> bb@example.com</p>
        <p><strong>Team 2 user email:</strong> jj@example.com</p>
        <p>The password for each user is 'password'</p>
        <p>The database is reset every night.</p>
      </div>
    </div>
  </div>