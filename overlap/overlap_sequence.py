# -*- coding: utf-8 -*-
#!/usr/bin/env python
"""capture the overlapping sequences of several database.
"""

import pandas as pd

path1 = r'..\DRAMP.csv'
f1 = pd.read_csv(path1, header=None, usecols=[0])
path2 = r'..\APD.csv'
f2 = pd.read_csv(path2, header=None, usecols=[0])
path3 = r'..\CAMP.csv'
f3 = pd.read_csv(path3, header=None, usecols=[0])
path4 = r'..\DRAMPpatent.csv'
f4 = pd.read_csv(path4, header=None, usecols=[0])
path5 = r'..\CAMPpatent.csv'
f5 = pd.read_csv(path5, header=None, usecols=[0])

#overlap between DRAMP and APD
a = 0
DRAMP_APD = []
for value1 in f1.values:
    for value2 in f2.values:
        if value1[0] == value2[0]:
            a = a + 1
            DRAMP_APD.append(value1[0])
            break
print('The overlap sequences between DRAMP and APD is %d.' % a)
A = a/19899
print('The overlap ratio in DRAMP is %f.' % A)
G = a/3031
print('The overlap ratio in APD is %f.' % G)
sequence=['Sequence']
overlap_DRAMP_APD = pd.DataFrame(columns=sequence, data=DRAMP_APD)
overlap_DRAMP_APD.to_csv('overlap_DRAMP_APD.csv')

#overlap between DRAMP and CAMP
b = 0
DRAMP_CAMP = []
for value1 in f1.values:
    for value3 in f3.values:
        if value1[0] == value3[0]:
            b = b + 1
            DRAMP_CAMP.append(value1[0])
            break
print('The overlap sequences between DRAMP and CAMP is %d.' % b)
B = b/19899
print('The overlap ratio in DRAMP is %f.' % B)
H = b/8164
print('The overlap ratio in CAMP is %f.' % H)
overlap_DRAMP_CAMP = pd.DataFrame(columns=sequence, data=DRAMP_CAMP)
overlap_DRAMP_CAMP.to_csv('overlap_DRAMP_CAMP.csv')

#overlap between APD and CAMP
c=0
APD_CAMP = []
for value2 in f2.values:
    for value3 in f3.values:
        if value2[0] == value3[0]:
            c = c + 1
            APD_CAMP.append(value2[0])
            break
print('The overlap sequences between APD and CAMP is %d.' % c)
C = c/3031
print('The overlap ratio in APD is %f.' % C)
I = c/8164
print('The overlap ratio in CAMP is %f.' % I)
overlap_APD_CAMP = pd.DataFrame(columns=sequence, data=APD_CAMP)
overlap_APD_CAMP.to_csv('overlap_APD_CAMP.csv')

#overlap between the patent dataset of DRAMP and CAMP
e=0
DRAMPpatent_CAMPpatent = []
for value4 in f4.values:
    for value5 in f5.values:
        if value4[0] == value5[0]:
            e = e + 1
            DRAMPpatent_CAMPpatent.append(value4[0])
            break
print('The overlap sequences between DRAMPpatent and CAMPpatent is %d.' % e)
E = e/14739
print('The overlap ratio in DRAMPpatent is %f.' % E)
L = e/2083
print('The overlap ratio in CAMPpatent is %f.' % L)
overlap_DRAMPpatent_CAMPpatent = pd.DataFrame(columns=sequence, data=DRAMPpatent_CAMPpatent)
overlap_DRAMPpatent_CAMPpatent.to_csv('overlap_DRAMPpatent_CAMPpatent.csv')


path6 = r'..\overlap_DRAMP_APD.csv'
f6 = pd.read_csv(path6, header=None, usecols=[1])
path7 = r'..\overlap_DRAMP_CAMP.csv'
f7 = pd.read_csv(path7, header=None, usecols=[1])

#overlap between the three
d=0
DRAMP_APD_CAMP = []
for value6 in f6.values:
    for value7 in f7.values:
        if value6[0] == 'Sequence' or value7[0] == 'Sequence':
            d = d
        else:
            if value6[0] == value7[0]:
                d = d + 1
                DRAMP_APD_CAMP.append(value6[0])
                break
print('The overlap sequences between the three is %d.' % d)
D = d/19899
print('The overlap ratio in DRAMP is %f.' % D)
J = d/3031
print('The overlap ratio in APD is %f.' % J)
K = d/8164
print('The overlap ratio in CAMP is %f.' % K)
overlap_DRAMP_APD_CAMP = pd.DataFrame(columns=sequence, data=DRAMP_APD_CAMP)
overlap_DRAMP_APD_CAMP.to_csv('overlap_DRAMP_APD_CAMP.csv')
