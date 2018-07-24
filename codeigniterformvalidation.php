<?php //echo validation_errors(); 
?>

<form method="post" action="<?php echo base_url();?>welcome/formvaldation">

<h5>Username</h5>
<input type="text" name="username" value="" size="50" />
<span style="color:red;"><?php echo form_error('username'); ?></span>

<h5>Password</h5>
<input type="text" name="password" value="" size="50" />
<span style="color:red;"><?php echo form_error('password'); ?></span>
<h5>Email Address</h5>
<input type="text" name="email" value="" size="50" />
<span style="color:red;"><?php echo form_error('email'); ?></span>
<div><input type="submit" value="Submit" /></div>

</form>


<!--  controller -->

   <?php
	public function formvaldation()
	{
	    $this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('validation');
	}else {
	    echo "hai";
	}
	}
	?>
<!-- end controller -->