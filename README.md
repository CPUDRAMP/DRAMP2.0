# DRAMP2.0
Scripts for code of DRAMP 2.0 manuscript submitted to Sci Data

The program provides the source code of the DRAMP database. And the program can detect overlapping sequences of antimicrobial peptide databases and pre-process antimicrobial peptide data in the DRAMP database, as well as be applied to all types of single-character peptide sequence processing.

About Data
-
All sequences are available in DRAMP(http://dramp.cpu-bioinfor.org/), APD(http://aps.unmc.edu/AP/) and CAMP(http://www.camp.bicnirrh.res.in/) database.

Directory structure:
-

#### /DRAMP_origin_source/ contains the origin source of the DRAMP database

#### ./overlap contains a python script that calculate overlapping sequences of DRAMP, APD and CAMP database.

How to run the code on AMP data:
-
#### Calculate the overlapping sequences of several databases
* Run overlap_sequence.py to capture overlapping sequences. Place some sequences from several databases in the first column of corresponding .csv file. It will output overlapping sequences in .csv format.
