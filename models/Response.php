<?php
	class Response
	{
		private $data = array("message"=>"There was an error.", "success"=>false);

		function fail($message)
		{
			$this->success = false;
			$this->message = $message;
			echo $this;
		}

		function succeed($message)
		{
			$this->success = true;
			$this->message = $message;
			echo $this;
		}

		function __set($name, $value)
		{
			$this->data[$name] = $value;
		}
		function __get($name)
		{
			if ($name === "data")
			{
				return $this->data;
			}
			return $this->data[$name];
		}
		function __toString()
		{
			return json_encode($this->data);
		}
	}
?>