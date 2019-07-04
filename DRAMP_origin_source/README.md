# DRAMP-2.0
The program can detect overlapping sequences of antimicrobial peptide databases and pre-process antimicrobial peptide data in the DRAMP database, as well as be applied to all types of single-character peptide sequence processing.

About Data
-
All sequences are available in DRAMP(http://dramp.cpu-bioinfor.org/), APD(http://aps.unmc.edu/AP/) and CAMP(http://www.camp.bicnirrh.res.in/) database.

Directory structure:
-
#### /R/ contains the primary R code to run the calculation
* ./R/FASTA contains a R script that convert .csv into .FASTA.
* ./R/two_sample_logos contains R scripts that capture specific sequences at the end of peptides.

#### /Python/ contains the primary Python code to run the calculation
* ./Python/motif contains a python script that search specific motif.
* ./Python/overlap contains a python script that calculate overlapping sequences of DRAMP, APD and CAMP database.

How to run the code on AMP data:
-
#### Calculate the overlapping sequences of several databases
* Run overlap_sequence.py to capture overlapping sequences. Place some sequences from several databases in the first column of corresponding .csv file. It will output overlapping sequences in .csv format.

#### Search the specific motif in multiple sequences
* Run capture_motif.py to capture the specific motif of natural AMPs, example ‘FLP', 'ATCDL' in the manuscript. Place the sequences in the first column of .csv. It will output selected sequences in .csv format. 

#### Sequence stored in .csv is converted to FASTA format 
* Run csv_to_FASTA.R to convert the format. Place the name and sequence in .csv first two column respectively, and header in .csv. It will output a txt file to store them.

#### Capture sequence from N- or C-terminal sequences
* Run N_truncated_sequence.R or C_truncated_sequence.R to capture the expected sequence. Place the name and sequence in .csv first two column respectively, and header in .csv. It will output a txt file to store them.
