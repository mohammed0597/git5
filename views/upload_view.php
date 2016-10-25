
<?php

echo'<h1>upload form</h1>';
if ($this->session->flashdata('errors')) {
    echo $this->session->flashdata('errors');
}
echo '<div class="col-md-4 pull-left">';
?>

<?php

echo '<div class="form_login">';
$data = array(
    'class' => 'form-horizontal',
    'method' => 'post'
);


echo form_open('video/upload', $data);
echo'<div class="form-group">';
$data = array(
    'class' => 'form-control',
    'type' => 'text',
    'name' => 'video_name',
    'placeholder' => 'video_name'
);
echo form_input($data);
echo'</div>';


echo'<div class="form-group">';
$data = array(
    'class' => 'form-control',
    'type' => 'file',
    'name' => 'video',
    'placeholder' => 'video'
);



echo form_input($data);
echo'</div>';


echo'<div class="form-group">';
$data = array(
    'class' => ' btn btn-primary',
    'type' => 'submit',
    'value' => 'upload'
);
echo form_input($data);
echo'</div>';






echo form_close();
echo'</div>';

echo'</div>';
?>
