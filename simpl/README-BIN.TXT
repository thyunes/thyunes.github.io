
This is the README file for SIMPL's demo version 0.08.22, October 2008.

INTRODUCTION:
------------

This demo version of SIMPL has been made available as a
companion to the following paper:

"An Integrated Solver for Optimization Problems",
Ionut Aron, John Hooker and Tallys Yunes.
Working Paper WPS-MAS-08-01, School of Business Administration,
University of Miami, 2008.

This way, interested readers can verify and replicate our results.
If you'd like to cite this paper, please cite it as shown above.
It's available for download at http://moya.bus.miami.edu/~tallys/simpl.php.


DISCLAIMER:
----------

The code is provided for the sole purpose of research dissemination.
It comes with absolutely no warranty and it may contain bugs.
Use it at your own risk.

The computational results shown in the paper were obtained
using CPLEX 11.0 and ECLiPSe 5.8.103 on an Intel Pentium 4
3.8GHz with 4GB of RAM. If you use different versions of
CPLEX and/or ECLiPSe your computational results may vary.


INSTALLATION:
------------

The instructions contained herein assume that your are
using GNU/Linux. This demo version of SIMPL was compiled for
GNU/Linux using gcc 4.2.4 and ar 2.18.0.20080103 under
Ubuntu 8.04 running kernel 2.6.24-19.

Download the file simpl-demo-0.08.22.tgz and unpack it like this:

tar xvzf simpl-demo-0.08.22.tgz

This will create a directory called SIMPL-DEMO.
Inside this directory you'll find the following:

Makefile       A makefile to compile the example problems from the paper
eclipse        Directory with custom ECLiPSe files
include        Directory containing SIMPL C++ header files
lib            Directory containing SIMPL's library files.
msched         Directory with files and instances for the machine scheduling example
prodconf       Directory with files and instances for the product configuration example
prodplan       Directory with files and instances for the production planning example
global         Directory with files and instances for the bilinear global optimization example
truss          Directory with files and instances for the truss structure design example
README.TXT     This file

You need to obtain and install CPLEX and ECLiPSe.
Go to www.ilog.com and www.eclipse-clp.org, respectively,
for instructions on how to do so. After installation, edit
the beginning of the file "Makefile" in the SIMPL-DEMO directory
so that the variables CPLEXDIR and ECLIPSEDIR contain the correct paths
to the CPLEX and ECLiPSe installation directories, respectively.
If necessary, also edit the INCDIR and LIBDIR variables for
both CPLEX and ECLiPSe.
This demo version of SIMPL has been tested with CPLEX versions
9, 10 and 11. It should also work with any versions of ECLiPSe
greater than or equal to 5.8.80.
Select the appropriate SIMPL library file according to your
CPLEX version (see comment inside Makefile).

After installing ECLiPSe, copy all the files in SIMPL-DEMO/eclipse
into the lib directory of your ECLiPSe installation.

Finally, you must set up the environment variable ECLIPSEDIR
to point to your eclipse installation directory (this is the same
path you use to set the ECLIPSEDIR variable in the Makefile).

Now go inside the SIMPL-DEMO directory and run:

make

This will compile all the examples and have them ready for execution.


EXECUTION:
---------

After successful compilation, each of the example directories will
contain a SIMPL executable that solves instances from that particular
problem. Data files have extension .dat and are named to be easily
identifiable as instances from the tables in the paper. For each
instance data file, there will also be a .lp file which contains a
Mixed-Integer Linear Programming formulation of the problem that can
be solved by CPLEX using the command line interface (those files
will be inside a sub-directory called LP-files). For the global
optimization examples specifically (bilinear and truss), there will
be a directory called gams that contains GAMS model files
that can be used to replicate the BARON results shown in the paper.

For example, to use SIMPL to solve the first instance of the
production planning problem (5 products), go into the prodplan
directory and issue the command:

prodplan prodplan-05.dat

The other example directories work in a similar way.


CONTACT INFORMATION:
-------------------

Questions, comments and suggestions are welcome.
Please direct all inquiries to my_first_name@miami.edu.
By the way, my_first_name is tallys :-)
