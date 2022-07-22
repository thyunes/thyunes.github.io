// cumulative.cpp:
// A C++ program using ILOG Concert Technology to read and
// solve cumulative scheduling problems from CuSPLIB (raw format).
// Visit http://moya.bus.miami.edu/~tallys/cusplib for details
// Copyright (c) 2009 Tallys Yunes

// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.

// For a copy of the GNU General Public License
// visit http://www.gnu.org/licenses/gpl.txt.

#include <strstream>
#include <iostream>
#include <ilcplex/ilocplex.h>

ILOSTLBEGIN

void usage(const char* name) {
  cerr << endl;
  cerr << "usage:   " << name << " [options] <data file>" << endl;
  cerr << "options: -m  minimize makespan" << endl;
  cerr << "         -d  minimize total weighted delay" << endl;
  cerr << endl;
}

int main (int argc, char **argv)
{
  IloEnv env;
  try {
    const char* datafile = " ";
    IloInt i, j, t, mode = 0;

    // Read command-line arguments
    for (i = 1; i < argc; i++) {
      if (argv[i][0] == '-') {
	switch (argv[i][1]) {
	case 'm':
	  mode = 1;  // Minimize makespan
	  break;
	case 'd':    // Minimize total weighted delay
	  mode = 2;
	  break;
	default:
	  usage(argv[0]);
	  throw (-1);
	}
      }
      else {
	datafile = argv[i];
	break;
      }
    }

    if ( mode == 0 ) {
      usage(argv[0]);
      throw (-1);
    }

    // Open input data file
    ifstream file(datafile);
    if ( !file ) {
      cerr << "ERROR: could not open input file " << datafile << endl;
      usage(argv[0]);
      throw (-1);
    }
    
    // Read problem data from file
    IloInt N, T, Cap;
    file >> N >> T >> Cap;

    IloIntArray  P(env,N), R(env,N), D(env,N), C(env,N), W(env,N);
    for (j = 0; j < N; j++)
      file >> P[j] >> R[j] >> D[j] >> C[j] >> W[j];

    IloModel model(env);
    IloArray<IloBoolVarArray> x(env,N);
    IloNumVarArray s(env);
    IloNumVarArray z(env);

    std::ostringstream ostr;

    // Create x_{jt} variables
    for (j = 0; j < N; j++) {
      x[j] = IloBoolVarArray(env,D[j]-P[j]-R[j]+1);
      for (t = R[j]; t <= D[j]-P[j]; t++) {
	ostr << "x[" << j+1 << "," << t << "]";
	x[j][t-R[j]] = IloBoolVar(env, ostr.str().c_str());
	ostr.str("");
      }
    }

    // Create start time variables s_j
    for (j = 0; j < N; j++) {
      ostr << "s[" << j+1 << "]";
      s.add(IloNumVar(env, R[j], D[j]-P[j], ILOFLOAT, ostr.str().c_str()));
      ostr.str("");
    }

    // Create machine utilization variables z_t
    for (t = 0; t <= T; t++) {
      ostr << "z[" << t << "]";
      z.add(IloNumVar(env, 0.0, Cap, ILOFLOAT, ostr.str().c_str()));
      ostr.str("");
    }

    // Create common constraints:

    // sum_t x_{jt} = 1, forall j
    for (j = 0; j < N; j++) {
      IloExpr expr(env);
      for (t = R[j]; t <= D[j]-P[j]; t++)
      	expr += x[j][t-R[j]];
      model.add(expr == 1);
      expr.end();
    }
    
    // s_j = sum_t t*x_{jt}, forall j
    for (j = 0; j < N; j++) {
      IloExpr expr(env);
      for (t = R[j]; t <= D[j]-P[j]; t++)
	expr += t*x[j][t-R[j]];           // In each x[j] vector, indices start at zero
      model.add(s[j] == expr);
      expr.end();
    }

    // Define z_0
    IloExpr expr(env);
    for (j = 0; j < N; j++)
      if (R[j] == 0)
	expr += C[j]*x[j][0];
      
    if (expr.getLinearIterator().ok())
      model.add(z[0] == expr);
    else
      model.add(z[0] == 0);
    expr.end();

    // Define z_t for t > 0
    for (t = 1; t <= T; t++) {
      IloExpr expr(env);
      for (j = 0; j < N; j++) {
	if (R[j] <= t && t <= D[j]-P[j])
	  expr += C[j]*x[j][t-R[j]];      // Potentially starting at t
	if (R[j]+P[j] <= t && t <= D[j])
	  expr -= C[j]*x[j][t-P[j]-R[j]]; // Potentially ending at t
      }
      model.add(z[t] == z[t-1] + expr);
      expr.end();
    }

    // Create objective-function specific constraints + objective function

    if (mode == 1) {

      // Create makespan variable mksp
      IloNumVar mksp(env, 0.0, IloInfinity, ILOFLOAT, "mksp");

      // mksp >= s_j + p_j, forall j
      for (j = 0; j < N; j++)
	model.add(mksp >= s[j] + P[j]);

      model.add(IloMinimize(env,mksp));

    }
    else if (mode == 2) {

      // Create delay variables delay_j
      IloNumVarArray delay(env);
      for (j = 0; j < N; j++) {
	ostr << "delay[" << j+1 << "]";
	delay.add(IloNumVar(env, 0.0, D[j]-P[j]-R[j], ILOFLOAT, ostr.str().c_str()));
	ostr.str("");
      }

      // delay_j >= s_j - r_j, forall j
      for (j = 0; j < N; j++)
	model.add(delay[j] >= s[j] - R[j]);

      // min sum_j w_j*delay_j
      IloExpr expr(env);
      for (j = 0; j < N; j++)
	expr += W[j]*delay[j];
      model.add(IloMinimize(env,expr));
      expr.end();

    }
    else {
      env.error() << "Unknown objective type: " << mode << endl;
      throw(-1);
    }

    // Optimize
    IloCplex cplex(model);
    IloTimer timer(env);

    cplex.exportModel("cumulative.lp");

    timer.start();

    if ( !cplex.solve() ) {
      env.error() << "Failed to optimize model." << endl;
      throw(-1);
    }
    
    timer.stop();

    // Output solution
    IloNumArray sval(env);
    env.out() << "Solution status = " << cplex.getStatus() << endl;
    env.out() << "Solution value = " << cplex.getObjValue() << endl;
    env.out() << "Elapsed time = " << timer.getTime() << endl;
    cplex.getValues(sval, s);
    env.out() << "sj values = " << sval << endl;
  }
  catch (IloException& e) {
    cerr << "Concert exception caught: " << e << endl;
  }
  catch (...) {
    cerr << "Unknown exception caught" << endl;
  }
  
  env.end();
  
  return 0;
}
