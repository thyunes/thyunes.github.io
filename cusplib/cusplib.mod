// ILOG OPL data declaration for CuSPLIB instances generated with geninst.pl
// See http://moya.bus.miami.edu/~tallys/cusplib for more details

int N = ...;        // Number of jobs
int T = ...;        // Number of discrete time intervals
int Cap = ...;      // Machine capacity

range Jobs = 1..N;
range Times = 1..T;

int P[Jobs] = ...;  // Job processing times
int R[Jobs] = ...;  // Job release dates
int D[Jobs] = ...;  // Job due dates
int C[Jobs] = ...;  // Machine utilization per job
int W[Jobs] = ...;  // Job weights

// Here comes the rest of your model...

