<?php
	class if_empty_key {
		function if_empty($word) {
			foreach ($word as $key=>$val){
				if ($val!="") {
					return TRUE;
				}
			}
		}
	}

?>