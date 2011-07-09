Code Kick Off lets you choose and integrate technologies like HTML5 boilerplate, Compass, different CSS grid frameworks & Wordpress, to start new web projects faster.

There are tons of new cool technologies out there that are helping us develop faster & faster. Code Kick Off goes one step further by integrating all these technologies in one place.

CodeKickOff lets you enter your project’s settings and choose the technologies you work with. Code Kick Off will create a .zip file with a set of files ready to be deployed immediately.


***Forking Documentation***

Forking CodeKickOff allows you to:
- Implement your own features
- Integrate it with your favorite Grid System
- Integrate it with your favorite CMS
- Fix existing bugs

**Files**

 /config.rb 		# CodeKickOff is built using Compass, this is the config.rb file

 /create.php 	# Contains the options form that lets you choose the technologies that you want to work with

 /css/ 			# Contains all the stylesheet files for the interface

 /functions.php 	# WordPress main functions file

 /header.php 	# WordPress main heaer file

 /img/ 			# Contains all the images used in the site

 /inc/ 			# Contains utility files
 /js/			# Contains all the js files used in the site
 /process2.php	# Processes the form submitted from create.php. This is where the zip file is generated
 /resources/		# These are all the files used to compile the final zip file
 /src/			# Source files for Compass

Please note that CodeKickOff was literaly a weekend project, so the code is far from pretty. Fork me if you create a prettier version of it :-).


**Adding a new features**

You can add your own grid system, cms, or features. Take a look at these files to start:

/create.php 	# Add your own options to the front-end form
/process2.php 	# Process the new options you added in create.php
/resources/		# Add your own grid files here in an ordered maner

Notice how through the resource files I use tags like %%general.wp.wp_head%% to pull content from one file and insert it in another. You can add your own tags if you wish.

The code is pretty much procedural (it kinda sucks) but it's very straight forward and easy to follow.

**Help**
You can send me an email at info@codekickoff.com with your questions and I can get back to you whenever I have time.

**Happy forking**