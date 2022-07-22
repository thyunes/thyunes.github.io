param N := 17;
param M := 17;
param T := 4;
param minUse := 4;
param maxUse := 5;

set Rows := {1..M};
set Columns := {1..N};
set Colors := {1..T};
set RCC := Rows cross Columns cross Colors;

var x[RCC] binary;

set Fixed := {
< 1, 3>, < 1,13>, < 1,15>, < 1,16>,
< 2, 1>, < 2, 9>, < 2,10>, < 2,12>,
< 3, 1>, < 3, 8>, < 3,14>, < 3,15>, < 3,17>,
< 4, 5>, < 4, 8>, < 4,11>, < 4,12>, < 4,13>,
< 5, 1>, < 5, 3>, < 5, 5>, < 5, 6>,
< 6, 6>, < 6, 7>, < 6, 9>, < 6,13>, < 6,17>,
< 7, 2>, < 7, 6>, < 7, 8>, < 7,10>, < 7,16>,
< 8, 4>, < 8, 6>, < 8,11>, < 8,14>,
< 9, 3>, < 9,10>, < 9,11>, < 9,17>,
<10, 1>, <10, 2>, <10, 4>, <10,13>,
<11, 2>, <11, 3>, <11, 7>, <11,12>, <11,14>,
<12, 4>, <12, 5>, <12, 7>, <12,10>, <12,15>,
<13, 1>, <13, 7>, <13,11>, <13,16>,
<14, 3>, <14, 4>, <14, 8>, <14, 9>,
<15, 5>, <15, 9>, <15,14>, <15,16>,
<16, 2>, <16, 9>, <16,11>, <16,15>,
<17, 4>, <17,12>, <17,16>, <17,17>
};

minimize z: sum <i,j,t> in RCC : x[i,j,t];

subto c1: forall <i,j> in Rows cross Columns do
          sum <t> in Colors : x[i,j,t] == 1;

subto c2: forall <i,j,a,b,t> in Rows cross Columns cross Rows cross Columns cross Colors
          with (i <= M-1) and (j <= N-1) and (a <= M-i) and (b <= N-j) do
          x[i,j,t] + x[i+a,j,t] + x[i,j+b,t] + x[i+a,j+b,t] <= 3;

subto c3: forall <i,j> in Fixed with (i <= M) and (j <= N) do
          x[i,j,1] == 1;

subto c4: forall <i,t> in Rows cross Colors do
          minUse <= sum <j> in Columns : x[i,j,t] <= maxUse;

subto c5: forall <j,t> in Columns cross Colors do
          minUse <= sum <i> in Rows : x[i,j,t] <= maxUse;

subto c6: x[1,1,2] == 1;

