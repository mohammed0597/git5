<?php
echo'<h1>login form</h1>';

echo '<div class="col-md-4 pull-left">';

if ($this->session->flashdata('errors')) {
    echo ($this->session->flashdata('errors'));
}
?>

<p class="bg-success" >
    <?php
    if ($this->session->flashdata('login_succed')) {
        echo $this->session->flashdata('login_succed');
    }
    ?>


</p>



<p class="bg-danger" >
<?php
if ($this->session->flashdata('login_failed')) {
    echo $this->session->flashdata('login_failed');
}
?>
</p>


    <?php
    if (!$this->session->userdata('logged_in')):
        echo '<div class="form_login">';


        $data = array(
            'class' => 'form-horizontal',
            'method' => 'post'
        );


        echo form_open('user/login', $data);
        echo'<div class="form-group">';
        $data = array(
            'class' => 'form-control',
            'type' => 'text',
            'name' => 'username',
            'placeholder' => 'username'
        );
        echo form_input($data);
        echo'</div>';


        echo'<div class="form-group">';
        $data = array(
            'class' => 'form-control',
            'type' => 'password',
            'name' => 'password',
            'placeholder' => 'password'
        );
        echo form_input($data);
        echo'</div>';



        echo'<div class="form-group">';
        $data = array(
            'class' => 'form-control btn btn-primary',
            'type' => 'submit',
            'value' => 'login'
        );
        echo form_input($data);
        echo'</div>';


        echo form_close();
        echo '</div>';

    else:
        if ($this->session->userdata('id', 'username')) {
            echo'you\'re logged in as ' . $this->session->userdata('username') . '';
            echo'...' . $this->session->userdata('id') . '';
        }
        $data = array(
            'class' => 'form_horizontal',
            'method' => 'post'
        );
        echo form_open('user/logout', $data);

        $data = array(
            'class' => 'btn btn-primary',
            'value' => 'logout',
        );

        echo form_submit($data);
        echo form_close();
    endif;

    echo'</div>';
    