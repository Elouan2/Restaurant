<?php
	class RegisterForm extends Form
	{
		public function build()
		{
			$this->addFormField("login");
			$this->addFormField("firstName");
			$this->addFormField("lastName");
			$this->addFormField("mail");
		}
	}