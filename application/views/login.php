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
        
        <?php 
            $config = array(
              'name'        => 'email',
              'type'        => 'text',
              'class'       => 'form-control',
              'id'          => 'inputEmail',
              'placeholder' => 'Correo Electrónico',
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

        <button type="submit" name="submit" class="btn btn-info btn-block">Sign in</button>
        <?php echo form_close() ?>

        </form>
      </div>
    </div>

  </div>