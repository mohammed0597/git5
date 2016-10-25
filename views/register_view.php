
<?php

echo'<h1>register form</h1>';
if ($this->session->flashdata('errors')) {
    echo $this->session->flashdata('errors');
}
echo '<div class="col-md-12 pull-left">';
?>

<?php

echo '<div class="form_login">';
$data = array(
    'class' => 'form-horizontal',
    'method' => 'post'
);


echo form_open('user/register', $data);
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
    'class' => 'form-control',
    'type' => 'password',
    'name' => 'password_repeat',
    'placeholder' => 'repeat password'
);
echo form_input($data);
echo'</div>';


echo'<div class="form-group">';
$data = array(
    'class' => ' btn btn-primary',
    'type' => 'submit',
    'value' => 'register'
);
echo form_input($data);
echo'</div>';



echo form_close();
echo '</div>';




echo form_close();
echo'</div>';

echo'</div>';
?>
