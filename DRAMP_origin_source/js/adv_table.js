 //##############################table###############head  
    function EditCells(thisCells)
    {
        var CellText= thisCells.innerHTML;
        if(CellText.substring(0,1)!="<")
        {
        		//alert("<input type=\"txt\" id=\"TextBox1"+thisCells.id+"\" value=\""+thisCells.innerHTML+"\" onblur=\"thisTextBoxOnblur(this)\" />");
            thisCells.innerHTML="<input type=\"txt\" id=\"TextBox1"+thisCells.id+"\" value=\""+thisCells.innerHTML+"\" onblur=\"thisTextBoxOnblur(this)\" />";
         		//alert("TextBox1"+thisCells.id);
        		document.getElementById("TextBox1"+thisCells.id).focus();
        }
    }
    //当文本框失去焦点后，将修改后的值保存到隐藏控件中。并将单元格的内容变回原来的内容。
    function thisTextBoxOnblur(thisTextBox)
    {
        var thisCellsID=thisTextBox.id;
        thisCellsID=thisCellsID.substring(8);
        //alert(thisCellsID);
        document.getElementById("HValue").value=thisTextBox.value;
        document.getElementById(thisCellsID).innerHTML=document.getElementById("HValue").value;
    }
    
//////////////////////////////
function apply_edit(URL_EDIT){
	var edit=document.getElementsByName("edit");
	
	for (i=0;i<edit.length;++i){

		var reg=new RegExp(edit[i].id+"=[^=]*&");

		var leg=edit[i].id + "="+ edit[i].innerHTML+"&";
		
		URL_EDIT=URL_EDIT.replace(reg,leg);
	}
	URL_EDIT=URL_EDIT.replace(/pageNow.*/,"");
	window.location.href=URL_EDIT;
}