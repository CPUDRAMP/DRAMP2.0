<?php
echo<<<EOF
				<div class="box1">
				  <h2>Knowledge-based Prediction</h2>
                <div id="TabbedPanels1" class="TabbedPanels">
                    <ul class="TabbedPanelsTabGroup">
                    </ul>
                    <div class="TabbedPanelsContentGroup">
                    <div class="TabbedPanelsContent">
                  
                    <form action="" method="get" name="pred_form" id="fm1">
                    <p>Please paste your FASTA sequence here.<a href="../home/help.html#004"></a></p>
                    <textarea name="pred_area"  cols="30" rows="3" wrap="virtual"></textarea>
                    <label>Or, upload a file</label>   
                    <input type="file" name="pred_file" class="btn_file" /> 
                    <div id="radio_box">                          
                     <span><input type="radio" name="pred_radio" value="physicochemical property prediction"/>
                     physicochemical property prediction</span>
                     <span><input type="radio" name="pred_radio" value="second structure prediction" />
                     second structure prediction</span>
                    </div>
                    <div id="btn_box">       
                      <input type="submit" name="pred_smt" class="btn_smt" value="Submit" />
                       <input type="reset" name="pred_reset" class="btn_reset" value="Reset" />
                    </div>
			      </form>
			       </div>
                     </div>
                  </div>
                 <div class="box_help">
                  <h3>help</h3>
                  <p></p>
                  </div>
                  </div>
EOF;
?>
