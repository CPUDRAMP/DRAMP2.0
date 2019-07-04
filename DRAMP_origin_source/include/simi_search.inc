<?php
echo<<<EOF
	<div class="box1">
		<h2>Similarity Search</h2>
      	<div id="TabbedPanels1" class="TabbedPanels">
	        <ul class="TabbedPanelsTabGroup">
	          <li class="TabbedPanelsTab" tabindex="0">Blast</li>
	          <li class="TabbedPanelsTab" tabindex="0">Ssearch</li>
	          <li class="TabbedPanelsTab" tabindex="0">HMMPfam</li>
	        </ul>
           <div class="TabbedPanelsContentGroup">
           
           
              <div class="TabbedPanelsContent">
			           <form action="" method="get" name="blast">
			           <p>Please paste your FASTA sequence here.</p>        
			           <textarea name="simi_area"  cols="30" rows="3" wrap="virtual"></textarea>
			               <label id="file">Or, upload a file </label>                    
			               <input type="file" name="simi_file" class="btn_file" />
						           <div class="option">
								           <div id="option_title">option</div>
								           <div>
								           <label>Matrix</label>
								           <select name="matrix" >
								           <option value="BLOSUM45">BLOSUM45</option>
								           <option value="BLOSUM50" >BLOSUM50</option>
								           <option value="BLOSUM62" selected="selected">BLOSUM62</option>
								           <option value="BLOSUM80">BLOSUM80</option>
								           <option value="BLOSUM90">BLOSUM90</option>
								           <option value="PAM30">PAM30</option>
								           <option value="PAM70">PAM70</option>
								           <option value="PAM250">PAM250</option>
								           </select>
								           </div>
								           <div>
								           <label>DataBase</label>
								           <select name="database">
								           <option value="DRAMP">DRAMP</option>
								           <option value="DRAMP">UniProtKB/Swiss-Prot</option>
								           <option value="DRAMP">Protein Structure Sequence(PDB)</option>
								           </select> 
								           </div>
						           </div>
						           <div id="btn_box"> 
						               <input type="hidden" value="fm_blast" name="tool_name" />              
						               <input type="submit"  class="btn_smt" value="Submit"/>
						               <input type="reset" class="btn_reset" value="Reset" />                       
						           </div>
			      	  </form>
              </div>
                
                  
              <div class="TabbedPanelsContent">
              <form action="../cgi-bin/seq-search/simi-search.cgi"  method="get"  enctype ="multipart/form-data"  name="sseach" >
              		<p>Please paste your FASTA sequence here.</p>        
              		<textarea name="simi_area"  cols="30" rows="3" wrap="virtual"></textarea>
                  <label id="file">Or, upload a file </label>                    
                  <input type="file" name="simi_file" class="btn_file" />
		              <div class="option">
		              <div id="option_title">option</div>
		              <div>
		              <label>Matrix</label>
		              <select name="matrix" >
		              <option value="-s BL50">BLOSUM50</option>
		              <option value="-s BL60" >BLOSUM60</option>
		              <option value="-s BP62" selected="selected">BLASTP62</option>
		              <option value="-s BL80">BLOSUM80</option>
		              <option value="-s PAM120">PAM120</option>
		              <option value="-s PAM250">PAM250</option>
		              <option value="-s M10">MDM10</option>
		              <option value="-s M20">MDM20</option>
		              <option value="-s M40">MDM40</option>
		              </select>
		              </div>
				               <div>
				              <label>E-value upper limit</label>
				              <select name="e_value_up">
				              <option value="-E 20">20.0</option>
				              <option value="-E 10">10.0</option>
				              <option value="-E 5">5.0</option>
				              <option value="-E 2">2.0</option>
				              <option value="-E 1">1.0</option>
				              <option value="-E 0.5">0.5</option>
				              <option value="-E 0.2">0.2</option>
				              <option value="-E 0.1">0.1</option>
				              <option value="-E 0.005">0.005</option>
				              </select> 
				              </div>
				              <div>
				              <label>E-value lower limit</label>
				              <select name="e_value_lw">
				              <option value="">none</option>
				              <option value="-F 1e-10">1e-10</option>
				              <option value="-F 1e-8">1e-8</option>
				              <option value="-F 1e-6">1e-6</option>
				              <option value="-F 1e-4">1e-4</option>
				              <option value="-F 1e-2">1e-2</option>
				              <option value="-F 1">1</option>
				              <option value="-F 10">10</option>
				              </select> 
				              </div>
				              <div>
				              <label>Alignments</label>
				              <select name="align">
				              <option value="10">10</option>
				              <option value="30">30</option>
				              <option value="50">50</option>
				              <option value="70">70</option>
				              <option value="100">100</option>
				              <option value="200">200</option>
				              <option value="500">500</option>
				              <option value="1000">1000</option>
				              </select> 
				              </div>
		              </div>
		              <div id="btn_box"> 
		                  <input type="hidden" value="fm_ssearch" name="tool_name" />              
		                  <input type="submit"  class="btn_smt" value="Submit"/>
		                  <input type="reset" class="btn_reset" value="Reset" />                       
		              </div>
	           </form>
              </div>
                
                      
              <div class="TabbedPanelsContent">
              <form action="" method="get" name="hmmPfam">
              <p>Please paste your FASTA sequence here.</p>        
              <textarea name="simi_area"  cols="30" rows="3" wrap="virtual"></textarea>
                  <label id="file">Or, upload a file </label>                    
                  <input type="file" name="simi_file" class="btn_file" />
              <div class="option">
              <div id="option_title">option</div>
		              <div>
		              <label>Search</label>
		              <select name="search" >
		              <option value="TiGRFAM">TiGRFAM</option>
		              <option value="Pfam" >Pfam</option>
		              <option value="SMART" selected="selected">SMART</option>
		              <option value="PTRSF">PTRSF</option>
		              </select>
		              </div>
		              <div>
		              <label>Alignments</label>
		              <select name="align">
		              <option value="10">10</option>
		              <option value="30">30</option>
		              <option value="50">50</option>
		              <option value="70">70</option>
		              <option value="100">100</option>
		              <option value="200">200</option>
		              <option value="500">500</option>
		              <option value="1000">1000</option>
		              </select> 
		              </div>	
              </div>
              <div id="btn_box"> 
                  <input type="hidden" value="fm_blast" name="tool_name" />              
                  <input type="submit"  class="btn_smt" value="Submit"/>
                  <input type="reset" class="btn_reset" value="Reset" />                       
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
