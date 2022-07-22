# ZIMPL data declaration for CuSPLIB instances generated with geninst.pl
# Assumes the data file is called csched.dat
# See http://moya.bus.miami.edu/~tallys/cusplib for more details

param N := read "csched.dat" as "1n" use 1 comment "#";
param T := read "csched.dat" as "1n" skip 1 use 1 comment "#";
param Cap := read "csched.dat" as "1n" skip 2 use 1 comment "#";

set Jobs := {1..N};
set Times := {1..T};

param P[Jobs] := read "csched.dat" as "<1n> 2n" skip 3 use N comment "#";
param R[Jobs] := read "csched.dat" as "<1n> 3n" skip 3 use N comment "#";
param D[Jobs] := read "csched.dat" as "<1n> 4n" skip 3 use N comment "#";
param C[Jobs] := read "csched.dat" as "<1n> 5n" skip 3 use N comment "#";
param W[Jobs] := read "csched.dat" as "<1n> 6n" skip 3 use N comment "#";

# Here comes the rest of your model...

