Code Kick Off lets you choose and integrate technologies like HTML5 boilerplate, Compass, different CSS grid frameworks & Wordpress, to start new web projects faster.

There are tons of new cool technologies out there that are helping us develop faster & faster. Code Kick Off goes one step further by integrating all these technologies in one place.

CodeKickOff lets you enter your project’s settings and choose the technologies you work with. Code Kick Off will create a .zip file with a set of files ready to be deployed immediately.


<h1>Forking Documentation</h1>

Forking CodeKickOff allows you to:

<ul>
	<li>Implement your own features</li>
	<li>Integrate it with your favorite Grid System</li>
	<li>Integrate it with your favorite CMS</li>
	<li>Fix existing bugs</li>
</ul>

<h2>Files</h2>
<table>
	<tr>
		<td>/config.rb</td>
		<td>CodeKickOff is built using Compass, this is the config.rb file</td>
	</tr>
	<tr>
		<td>/create.php</td>
		<td>Contains the options form that lets you choose the technologies that you want to work with</td>
	</tr>
	<tr>
		<td>/css/</td>
		<td>Contains all the stylesheet files for the interface</td>
	</tr>
	<tr>
		<td>/functions.php</td>
		<td>WordPress main functions file</td>
	</tr>
	<tr>
		<td>/header.php</td>
		<td>WordPress main heaer file</td>
	</tr>
	<tr>
		<td>/img/</td>
		<td>Contains all the images used in the site</td>
	</tr>
	<tr>
		<td>/inc/</td>
		<td>Contains utility files</td>
	</tr>
	<tr>
		<td>/js/</td>
		<td>Contains all the js files used in the site</td>
	</tr>
	<tr>
		<td>/process2.php</td>
		<td>Processes the form submitted from create.php. This is where the zip file is generated</td>
	</tr>
	<tr>
		<td>/resources/</td>
		<td>These are all the files used to compile the final zip file</td>
	</tr>
	<tr>
		<td>/src/</td>
		<td>Source files for Compass</td>
	</tr>
</table>

<small>Please note that CodeKickOff was literaly a weekend project, so the code is far from pretty. Fork me if you create a prettier version of it :-).</small>


<h2>Adding a new features</h2>

You can add your own grid system, cms, or features. Take a look at these files to start:

<table>
	<tr>
		<td>/create.php</td>
		<td>Add your own options to the front-end form</td>
	</tr>
	<tr>
		<td>/process2.php</td>
		<td>Process the new options you added in create.php</td>
	</tr>
	<tr>
		<td>/resources/</td>
		<td>Add your own grid files here in an ordered maner</td>
	</tr>
</table>

Notice how through the resource files I use tags like %%general.wp.wp_head%% to pull content from one file and insert it in another. You can add your own tags if you wish.

The code is pretty much procedural (it kinda sucks) but it's very straight forward and easy to follow.

<h2>Help</h2>
You can send me an email at info@codekickoff.com with your questions and I can get back to you whenever I have time.

<h2>Happy forking</h2>