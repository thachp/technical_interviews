<?php
	
	function add($a, $b)
	{
		if($b === 0)
		{
			return $a;
		}
		
		$sum = $a ^ $b; // sum
		$carry = ($a&$b) << 1; // sum without carry
		
		return add($sum, $carry);
		
	}
	
	$result = add(2,3);
	echo "result: " . $result;		
	
	
?>