#!/usr/bin/perl -w

# geninst.pl: CuSPLIB Random Instance Generator v1.0
# Visit http://moya.bus.miami.edu/~tallys/cusplib for details
# Copyright (c) 2009 Tallys Yunes

# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.

# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.

# For a copy of the GNU General Public License
# visit http://www.gnu.org/licenses/gpl.txt.

sub print_usage
{
    print "\ngeninst.pl: CUSPLIB Random Instance Generator\n";
    print "Copyright (c) 2009 Tallys Yunes\n";
    print "This program comes with ABSOLUTELY NO WARRANTY.\n";
    print "This is free software, and you are welcome to redistribute it\n";
    print "under certain conditions; see source code for details.\n\n";

    print "Usage: geninst.pl <m> <n> <T> <Cap> <cmin> <cmax> <wmin> <wmax> <pmin> <pmax> <mode>\nwhere:\n";
    print "\tm = number of instances to generate (< 1000)\n";
    print "\tn = number of jobs\n";
    print "\tT = length of time horizon\n";
    print "      Cap = machine capacity\n";
    print "cmin,cmax = job sizes in % of Cap (uniformly drawn)\n";
    print "wmin,wmax = job windows in % of T (uniformly drawn)\n";
    print "pmin,pmax = job durations in % of their windows (uniformly drawn)\n";
    print "emin,emax = job weights (uniformly drawn)\n";
    print "     mode = type of output (1=ZIMPL, 2=OPL, 3=raw)\n";
    print "\n";
}

sub zimpl_output
{
    my $handle = shift;

    print $handle "$N\t# number of jobs N\n$T\t# time horizon T\n$Cap\t# resource capacity Cap\n";
    print $handle "# The column values are in the following order: P, R, D, C, W\n";
    for ($j = 1; $j <= $N; $j++) {
	print $handle "$j\t$P[$j]\t$R[$j]\t$D[$j]\t$C[$j]\t$W[$j]\n";
    }
}

sub opl_output
{
    my $handle = shift;
    
    print $handle "N = $N;\nT = $T;\nCap = $Cap;\n";
    
    # Create P vector
    print $handle "P = [\n     ";
    for ($j = 1; $j <= $N; $j++) {
	print $handle "$P[$j]";
	if ($j < $N) {
	    print $handle ", ";
	    if ($j % 10 == 0) {
		print $handle "\n     ";
	    }
	}
	else {
	    print $handle "\n";
	}
    } 
    print $handle "    ];\n";
    
    # Create R vector
    print $handle "R = [\n     ";
    for ($j = 1; $j <= $N; $j++) {
	print $handle "$R[$j]";
	if ($j < $N) {
	    print $handle ", ";
	    if ($j % 10 == 0) {
		print $handle "\n     ";
	    }
	}
	else {
	    print $handle "\n";
	}
    } 
    print $handle "    ];\n";
    
    # Create D vector
    print $handle "D = [\n     ";
    for ($j = 1; $j <= $N; $j++) {
	print $handle "$D[$j]";
	if ($j < $N) {
	    print $handle ", ";
	    if ($j % 10 == 0) {
		print $handle "\n     ";
	    }
	}
	else {
	    print $handle "\n";
	}
    } 
    print $handle "    ];\n";
    
    # Create C vector
    print $handle "C = [\n     ";
    for ($j = 1; $j <= $N; $j++) {
	print $handle "$C[$j]";
	if ($j < $N) {
	    print $handle ", ";
	    if ($j % 10 == 0) {
		print $handle "\n     ";
	    }
	}
	else {
	    print $handle "\n";
	}
    } 
    print $handle "    ];\n";
    
    # Create W vector
    print $handle "W = [\n     ";
    for ($j = 1; $j <= $N; $j++) {
	print $handle "$W[$j]";
	if ($j < $N) {
	    print $handle ", ";
	    if ($j % 10 == 0) {
		print $handle "\n     ";
	    }
	}
	else {
	    print $handle "\n";
	}
    } 
    print $handle "    ];\n";
}

sub raw_output
{
    my $handle = shift;

    print $handle "$N $T $Cap\n";

    for ($j = 1; $j <= $N; $j++) {
	print $handle "$P[$j] $R[$j] $D[$j] $C[$j] $W[$j]\n";
    }
}

sub generate_instances
{
    $cLo = int($cmin*$Cap/100); $cHi = int($cmax*$Cap/100);  # Range of values for cj
    if ($cLo == 0) { $cLo = 1; }
    if ($cHi == 0) { $cHi = 1; }

    $wLo = int($wmin*$T/100); $wHi = int($wmax*$T/100);      # Range of values for (dj-rj)
    if ($wHi == 0) { $wHi = 1; }
  
    for ($i = 1; $i <= $numinst; $i++) {
	
	# Generate job data
	for ($j = 1; $j <= $N; $j++) {
	    $C[$j] = int(rand ($cHi-$cLo+1)) + $cLo;
	    $wj = int(rand ($wHi-$wLo+1)) + $wLo;
	    $R[$j] = int(rand ($T-$wj+1));
	    $D[$j] = $R[$j]+$wj;
	    $pLo = int($pmin*$wj/100);  # Range of values for pj
	    $pHi = int($pmax*$wj/100);
	    $P[$j] = int(rand ($pHi-$pLo+1)) + $pLo;
	    $W[$j] = int(rand ($emax-$emin+1)) + $emin; 
	} 
	
	$id = sprintf("%03d",$i);
	if ($mode == 1) {
	    open(OUT,">csched-${id}-zimpl.dat");
	    zimpl_output(OUT);
	}
	elsif ($mode == 2) {
	    open(OUT,">csched-${id}-opl.dat");
	    opl_output(OUT);
	}
	elsif ($mode == 3) {
	    open(OUT,">csched-${id}-raw.dat");
	    raw_output(OUT);
	}
	else {
	    print_usage;
	    exit;
	}
	close(OUT);
    }
}

###############
# Main Program
###############

# Initialize seed of pseudo-random number generator
$seed = time() ^ ($$ + ($$ << 15));
print "pseudo-random seed = $seed\n";
srand($seed);

# Display program usage
if (@ARGV != 13) {
    print_usage;
    exit;
}

($numinst,$N,$T,$Cap,$cmin,$cmax,$wmin,$wmax,$pmin,$pmax,$emin,$emax,$mode) = @ARGV;

if ($numinst < 1 || $numinst > 999 || ($mode != 1 && $mode != 2 && $mode != 3)) {
    print_usage;
    exit;
}

generate_instances;

exit;
