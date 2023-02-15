# Job Listings

"Job Listings" is a small project to practice PHP. The goal was to parse a json file with job listings and display them along with a filter. To this purpose, a very simple solution is offered here - the jobs are filtered by means of a search bar. The results may be filtered (with one word at a time) by: the role (Frontend, Fullstack or Backend), the level (Junior, Midweight or Senior), the languages used (HTML, CSS, JavaScript, Python or Ruby) and the tools used (React, Sass, Ruby, RoR, Vue or Django). Filtering the results with several tags simultaneously may be left for future work. To return to the full list, a home button is included.

<p float="center">
  <img src="/images/exemplo.png" width="1000" />
</p>

## File System
This project is organized in a way that ensures an easy maintenance; this logic can be applied to a greater scope of projects.
<ul>
  <li style="list-style-type:square"> The subdirectory "views" contains all the files responsible for displaying the output. The "layowt.view.php" file contains all the html instructions that define the page. These are the generic instructions that could easily be used in another page. In the body section, the require statement is used to call the code that displays our data. This code is contained in the "index.view.php" file;</li>
  <li style="list-style-type:square">The subdirectory "app" contains all the auxiliary files. The file "functions.php" is where all the functions are defined; "config.php" contains all the constants of the program (in our case, just the datafile name); the "app.php" call on the remaining two files with the require statement. The point of this file is to obtain the simplest main program file possible, where we just call a single php file with all auxiliary files, we import the data, parse the data and display it (a total of 4 commands).</li>
  <li style="list-style-type:square">The remaining subdirectories contain the remaining necessary objects (images and fonts, as the name indicates).</li>
  <li style="list-style-type:square">In the main directory, there is a total of 4 files: two css files that describe how the html elements are to be displayed (these were retrieved from tutorials and are probably unnecessarily long), the data file and the main "index.php" file. This is our main app file that follows the four steps described above.</li>

</ul>

## Getting Started

These instructions will get you a copy of the project up and running on your local machine.

### Installing & Running the Application

<b>1.</b> PHP is a server-side scripting language, which means that a server executes the instructions in a script. Thus being, a program must be installed to set up your local server.
Suggestions:
  <ul>
    <li>For Windows and macOS: https://www.mamp.info/en/downloads/</li>
    <li>For Windows, macOS and Linux: https://www.apachefriends.org/download.html </li>
  </ul>
  
<b>2.</b> Activate the Apache Web Server by means of the GUI of the software installed in the previous step (take note of the port number);

<b>3.</b> Transfer all the files in this repository;

<b>4.</b> Move the files to the htdocs directory. This is the directory that the Apache web server looks for files to serve on your domain by default. This location can be changed to whatever value you want. All you have to do is point the Document Root to a different folder in your httpd.conf file.

<b>5.</b> To run the application, open your web browser and type in the search bar: localhost:<port number>/Job-listings/
  
  Note that in the previous statement it was assumed that this project folder was named "Job-listings" and contained in the htdocs directory.
