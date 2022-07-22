<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Web page of Tallys Yunes" />
<meta name="keywords" content="operations,research,integer,constraint,mathematical,programming,integration,hybrid,combinatorial,optimization,scheduling,logistics,heuristic,neighborhood,simpl,university,miami,management,science" />
<meta name="author" content="Tallys Yunes / Original design: Andreas Viklund - http://andreasviklund.com/" />
<link rel="stylesheet" type="text/css" href="mycss.css" media="screen,projection" />
<link rel="stylesheet" type="text/css" href="print.css" media="print" />
<title>Tallys Yunes</title>
</head>

<body>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-4942624-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>

<div id="wrap">

<?php include("common.html"); ?>

<div id="content">
<h2>Welcome!</h2>
<p>
I am a <a href="http://en.wikipedia.org/wiki/Carioca">"<i>carioca</i>"</a> who studied computer engineering and computer science at <A HREF="http://www.unicamp.br">UNICAMP</A>, in Brazil.
  After developing a passion for using computers and mathematics (optimization) to help people and businesses make better decisions, I received a Ph.D. from 
<A HREF="http://www.tepper.cmu.edu">Carnegie Mellon University</A>
and subsequently joined the faculty at the University of Miami.
Here is my <A HREF="biosketch.pdf">short bio</A>.
A complete list of my publications,
talks, teaching experience, and consulting activities can be found in
my curriculum vit&aelig;
(<A HREF="yunes-cv.pdf" onMouseOver="window.status='Curriculum Vitae'; return true">.pdf</A>,
<A HREF="yunes-cv.html" onMouseOver="window.status='Curriculum Vitae'; return true">.html</A>).
For some fun and interesting applications of optimization to real life,
watch <a href="https://youtube.com/c/TallysYunes">my YouTube channel</a>,
<A HREF="https://twitter.com/intent/follow?original_referer=http%3A%2F%2Fmoya.bus.miami.edu%2F~tallys%2F&region=follow_link&screen_name=thyunes&source=followbutton&variant=2.0">follow me on Twitter</A>,
read my blog <a href="http://orbythebeach.wordpress.com">O.R. by the Beach</a>,
or
play <a href="games.php">my games</a>.

<p>

<br>
<h2>Curious About What I Do?</h2>
<p>
It's easier to explain through a few examples:

<br><br>

<h3>Major League Baseball Umpire Scheduling</h3>
<img src="images/umpires.jpg">
When you look at the MLB season schedule, do you ever wonder who decides that team A will play team B on a certain date, at a certain time and location? That's a very tough problem and it's tackled <a href="http://www.sports-scheduling.com">by these guys</a>. Now let's say that someone created the game schedule for you. The next step is to create a work schedule for the umpires. There are many union rules and league regulations that must be followed. For example, umpires should not work more than 21 consecutive days without a day off, they should not see the same team too often during the season, they want to see every one of the 30 teams at least once, and so on. We developed a heuristic approach to solve the MLB umpire scheduling problem that was used by the league in 2006, and also from 2008 to 2010.
Starting in the 2011 season, new scheduling requirements resulted in modifications to this method.
Scientific American created a <a href="http://www.scientificamerican.com/podcast/episode.cfm?id=researchers-tell-umpires-where-to-g-11-08-18">60-second podcast about our work</a>.
  You can also listen to my explanation of the problem, which aired on WAMC's Academic Minute (Northeastern Public Radio):
<!--
<a href="http://www.publicbroadcasting.net/wamc/news.newsmain/article/7288/0/1863691/Academic.Minute/Dr..Tallys.Yunes..University.of.Miami.-.Umpire.Scheduling">here's a link to their site</a>,
-->
<a href="http://www.insidehighered.com/audio/2011/10/19/umpire-scheduling">here's a link to their site</a>,
and <a href="http://moya.bus.miami.edu/~tallys/orbtb/yunes-academic-minute.mp3">here's the MP3 file</a>.
To learn more, <a href="http://moya.bus.miami.edu/~tallys/docs/umpires-inte.pdf">read our paper</a>.
<p>

<hr>

<p>
<h3>Product Line Simplification</h3>
<img src="images/cat-bhl.jpg">
Have you ever felt overwhelmed by the amount of choices you have at the supermarket, or at a car dealership, or at the pharmacy? Why so many variants of toothpaste? Product variety is a double-edged sword: on one hand, customers tend to appreciate variety because it makes them feel like they can always find exactly what they need; on the other hand, variety is costly to companies because it translates into higher manufacturing costs (more complex factories), higher training costs, more chances for mistakes, higher marketing costs, and so on. There's been a recent trend toward reducing the size of product lines, but it has to be done carefully. We worked with John Deere and Caterpillar to help them strategically optimize their tractor lines, yielding gains in the order of tens of millions of dollars.
The Spring 2008 issue of the
<a href="http://bus.miami.edu/magazine">BusinessMiami Magazine</a>
has <a href="docs/businessmiami-magazine-spring08-customization.pdf">an article on this topic</a>
entitled "<i>The Costs of Customization</i>."
To learn more, read <a href="http://moya.bus.miami.edu/~tallys/docs/deere-or.pdf">our John Deere paper</a>
and <a href="http://moya.bus.miami.edu/~tallys/docs/cat-pom.pdf">our Caterpillar paper</a>.
<p>

<hr>

<p>
<h3>Health Care Appointment Scheduling</h3>
<img src="images/appointment.jpg">
When scheduling health care appointments such as a doctor's visit or MRI scan, there are typically three main types of costs that matter: the waiting cost of the patient (you don't want them to wait too much), the cost of the doctor's or equipment's time (you don't want them to be idle), and overtime costs. These costs can increase or decrease depending on how many customers are scheduled on a single day, and how close to each other the appointments are. Is it better to schedule patients in 15- or 30-minute intervals? If no shows are frequent, should you overbook? If so, by how much? What about the uncertainty in the time it takes to see a patient? A colleague and I took into account all of the issues above and proposed an algorithm to generate a schedule that minimizes the aforementioned costs, which can be prioritized to fit specific needs. To learn more, <a href="http://moya.bus.miami.edu/~tallys/docs/multimodular-ms-0.pdf">read our paper</a>. 
<p>

<hr>

<p>
<h3>Buying and Shipping from Multiple Suppliers</h3>
<img src="images/burger1.jpg">
A fast-food chain needs to buy a large quantity of many different items for each of its several restaurant locations, such as: burger patties, cheese, napkins, cups, vegetables, coffee, etc. There are several possible suppliers for each item who differ from each other in terms of cost, capacity, and distance from the delivery addresses. This means transportation costs also need to be taken into account, as well as whether or not to combine multiple items (or large quantities) together to earn discounts due to economies of scale. I have been working with a national chain of fast-food restaurants to help them fine tune this optimization model: what to buy, from whom, in what quantity, and using what mode of transportation so as to supply the restaurants with what they need at minimum total cost.
<p>

<hr>

<p>
<h3>Fire, Disease, and Information Containment</h3>
<center>
<img align=center border=0 src="images/firefighter.gif">
</center>
Imagine you are interested in containing the spread of something undesirable, such as fire, disease, or sensitive/false information. These things usually have a starting point and spread further and further to places or people who are close/adjacent (i.e. connected) to those already affected. A connected structure like this is shown above. It is known as a network, and is typically depicted by a so-called <i>graph</i>: a picture consisting of nodes (the circles) joined by edges (the lines). For example, the nodes can represent people and edges between them indicate they know or have contact with each other; or nodes represent parts of a forest and edges indicate there are paths from one to the other along which fire could spread. The goal is to strategically <i>defend</i> certain nodes to contain whatever is spreading in order to minimize how many nodes are ultimately affected. In the case of fire, defending a node could be dropping a fire retardant from an airplane. In the case of disease, defending could be vaccinating certain groups of people or animals.
<!--
Finally, in the case of information spread, defending a node could mean educating or better informing people, or even disabling information propagation with technology (e.g. shutting down a node's communication ability).
-->
The animation above illustrates a fire spreading out from one initial red node. In the first round, we can defend any two nodes of our choice, after which the fire spreads further to unprotected nodes that are connected to the burned node. In the next round, we pick another two nodes to defend, the fire spreads again, and so on, until it is contained. After the last round of defense, any remaining untouched nodes are safe from the threat. In the example above, we saved 60% of the network.

<p>

<hr>

<p>
<h3>Concert Tour Route Optimization</h3>
<img src="images/concert-crowd.jpg">
  How does a band of musicians choose the order in which to visit the different cities in their upcoming tour? There are many factors that come into play. In addition to the available dates at the venues that host concerts in each city, the producer in charge of putting the tour together needs to consider other issues, such as: giving the band a day off between several shows in a row; which days of the week/weekend are better in terms of attendance; the time it takes the equipment to travel from place to place; overall miles traveled, days on the road, etc. When you put all of these factors together, this becomes a challenging problem to solve by hand.
This is an example of a <i>multi-objective optimization</i> problem because the quality of a solution depends on how well it satisfies all of the above requirements.
One of my undergraduate students worked on this problem for his honors summer research project.
<!--
He developed a heuristic approach capable of quickly generating several alternative solutions that are superior to manual solutions. 
-->
<p>

<hr>

<p>
<h3>What Do a Computer, a Container Port, and a Pizza Oven Have in Common?</h3>
<img src="images/pizza.jpg">
In abstract terms, all of these three things can be regarded as a <i>resource</i> that is able to perform multiple <i>tasks</i> in parallel: a computer can run multiple programs at a time (multitasking), a container port can load/unload multiple cargo ships at a given berth simultaneously, and a pizza oven can bake many pizzas together.
As the number of tasks increases (more users logged into the computer, a busy day at the port or at the pizzaria), and as the planning horizon increases, the order in which you choose to perform the tasks starts to matter a lot.
Moreover, finding the order that will allow you to finish everything as early as possible becomes very difficult.

<p>

<hr>

<p>
<h3>Information Display on Maps</h3>
<img src="images/us-250.jpg">
Let's say you want to display the 250 largest cities on a map of the United States. Each city is represented by an opaque disk that's centered at that city's location and whose radius is proportional to the city's population. Such maps are known as <i>proportional symbol maps</i> and they're used by cartographers to analyze location-specific data, such as temperature at weather stations, oil well production, earthquake magnitudes, and population statistics. The question is: given the disks overlap with each other and there are many possible choices regarding which disk to draw on top of which other disk, what's the best way to draw the 250 disks on the map above? Or on any map in general?
We created an optimization model to solve this problem and find the absolute best drawing, which is depicted above.
The map below shows locations and magnitudes of earthquakes in Japan.
To learn more, <a href="http://moya.bus.miami.edu/~tallys/docs/symbol-ijoc-full.pdf">read our paper</a>.
<img width="450" src="images/japan-earthquakes.jpg">
<p>

<hr>

<p>
<h3>Scheduling Bus Drivers</h3>
<img src="images/bus.jpg">
The demand for public transportation influences the location of bus stops, the routes, and the frequency of bus trips each day of the week.
Once specific trips have been selected, each of them having a departure location, a departure time, and a destination, it's time to assign bus drivers to them.
The workday of a bus driver is structured to satisfy some restrictions.
For example, there must be rest breaks, lunch breaks, and a minimum number of hours between the last trip of one day and the first trip of the next day, among other things.
We worked on a bus driver scheduling problem for a city in Brazil and managed to generate an assignment of drivers to trips that respected all regulations and drastically reduced the amount of driver overtime.
To learn more, <a href="http://moya.bus.miami.edu/~tallys/docs/crew-ts.pdf">read our paper</a>.
<p>

<hr>

<p>
<h3>Hybrid Methods</h3>
<a href="http://en.wikipedia.org/wiki/Chimera_(mythology)"><img border=0 src="images/chimera-1.jpg"></a>
Sometimes, standard techniques for solving complex decision problems
are not able to satisfactorily handle the situation at hand when
used in isolation.
Hence, part of my research focuses on developing the theory and
facilitating the implementation of hybrid optimization algorithms
that integrate multiple solution techniques (a decision-making
<a href="http://en.wikipedia.org/wiki/Chimera_(mythology)">chimera</a>, if you will).
The Spring 2006 issue of the <A HREF="http://magazine.tepper.cmu.edu">Tepper Magazine</A>
has <a href="docs/tepper-magazine-spring06-simpl.pdf">an article on this topic</a> entitled
"<I>Two disciplines join to optimize solutions to enterprise-wide problems</I>."
<!--
To have an idea of what integrated optimization can do for you, take a look at
some <a href="integrated.php" onMouseOver="window.status='Success stories'; return true">success stories</a>.
-->
To learn more, <a href="http://moya.bus.miami.edu/~tallys/simpl/simpl-or-full.pdf">read our paper</a>.
<p>

<hr>

<p>
<h3>To Summarize...</h3>
I am interested in solving optimization problems that arise from
a variety of practical applications, such as the ones explained above,
as well as
call center scheduling,
political districting,
routing, transportation,
and operations management in general.
In order to address such problems, I use
<A HREF="http://www.analytics-magazine.org/november-december-2010/54-the-analytics-journey.html">Prescriptive Analytics</A>
or, more specifically, tools
from the fields of <A HREF="http://www.scienceofbetter.org">Operations Research</A> (OR) and <A
HREF="http://kti.ms.mff.cuni.cz/~bartak/constraints/">Constraint Programming</A> (CP). 
These tools are essentially mathematical models that contain a
simplified, but still useful, representation of the actual problem in
a way that can be solved by a computer.

<p>

</div>

<?php include("footer.html"); ?>

<center>

<a href="http://t.extreme-dm.com/?login=thyunes"
target="_top"><img src="http://t1.extreme-dm.com/i.gif"
name="EXim" border="0" height="38" width="41"
alt="eXTReMe Tracker" align=""></img></a>
<script type="text/javascript" language="javascript1.2"><!--
EXs=screen;EXw=EXs.width;navigator.appName!="Netscape"?
EXb=EXs.colorDepth:EXb=EXs.pixelDepth;//-->
</script><script type="text/javascript"><!--
var EXlogin='thyunes' // Login
var EXvsrv='s9' // VServer
navigator.javaEnabled()==1?EXjv="y":EXjv="n";
EXd=document;EXw?"":EXw="na";EXb?"":EXb="na";
EXd.write("<img src=\"http://e0.extreme-dm.com",
"/"+EXvsrv+".g?login="+EXlogin+"&amp;",
"jv="+EXjv+"&amp;j=y&amp;srw="+EXw+"&amp;srb="+EXb+"&amp;",
"l="+escape(EXd.referrer)+"\" height=1 width=1>");//-->
</script><noscript><img height="1" width="1" alt=""
src="http://e0.extreme-dm.com/s9.g?login=thyunes&amp;j=n&amp;jv=n"/>
</noscript>

</center>

<!--
<EMBED src="http://lads.myspace.com/mini/mini.swf?b=MTEyNjg1OTE=&o=NDcxNzU1Mzc=&d=MTE1MjM5ODAxMA==&u=aHR0cDovL211c2ljcGxheWVyLm15c3BhY2UuY29tLw==&i=Nzg0OTY2Njc=&a=VHJ1ZQ==" quality=high WIDTH="295" HEIGHT="51" NAME="mp3player" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
-->

</div>

</body>
</html>
