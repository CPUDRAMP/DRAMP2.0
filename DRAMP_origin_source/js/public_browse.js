
	 	function CreateFile(FORMAT,THE_NAME)
				{
					var num=0;
					quick_down=document.getElementsByName(THE_NAME);
					txt="";
					
					for (i=0;i<quick_down.length;++ i)
					{
						if (quick_down[i].checked)
					{
						num++;
						txt=txt + quick_down[i].value + " ";
						}
					}
					if(num > 0){
						down_string=escape(txt);
						window.location.href="../down_load/download.php?load_id="+txt+"&format="+FORMAT	
					}else{
						alert("Please Select Your Content");	
					}
				}
				
			
		function SelectAll(THE_ALL,THE_CHILD)
		{		
				//alert(THE_CHILD);		
 				var checkboxs=document.getElementsByName(THE_CHILD);
				var the_all_=document.getElementsByName(THE_ALL);
 				for (var i=0;i<checkboxs.length;i++) {
  					var e=checkboxs[i];
 					  e.checked=the_all_[0].checked;
				}
				
		}	
		
		
		function init(){
				$("#edit_query").hide();
		} 
		
		
		function Hide_Show(){
			if ($(document.getElementById("hide_or_show")).html() == "Hide Query"){
				document.getElementById("hide_or_show").innerHTML="Show Query";
				$("#edit_query").hide(1200);
			}else{
				document.getElementById("hide_or_show").innerHTML="Hide Query";
				$("#edit_query").show(1200);
			}
		}	
		