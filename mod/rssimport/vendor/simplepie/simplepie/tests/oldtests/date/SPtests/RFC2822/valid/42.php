<?php

class SimplePie_Date_Test_RFC2822_42 extends SimplePie_Date_Test
{
	function data()
	{
		$this->data = 'Fri, 05 Nov 94 12:15:30 -0100';
	}
	
	function expected()
	{
		$this->expected = 784041330;
	}
}

?>