

## Program to test the Stanford Parts of Speech Tagger on a Laravel App deployed on Heroku 
This is a sample Laravel App that will demonstrate the use of the The Stanford Natural Language Processing Groups's [Parts of Speech Tagger](https://nlp.stanford.edu/software/tagger.shtml)

The Tagger is actually a Java program, but since Laravel is a PHP Architecture Platform, we will be using [a PHP Wrapper written by Patrick Schur](https://github.com/patrickschur/stanford-nlp-tagger) to interface with the Tagger.

I have used composer to install Patricks module into this sample program and have created a Laravel Web endpoint at http://localhost.com/pos

and output:

 The 	dog 	sheds 	a 	lot
 DT 	NN 	VBZ 	DT 	NN
 

To get the above working I had to:

 * Install php7.3
 * Install [php7.3-pspell](https://packages.debian.org/buster/php7.3-pspell)
 * Install Java 8
 
 
  When I deploy to heroku however, the endpoint returns an empty array.
  This is most likely due to missing php libraries on heroku, and missing Java 8.
  
I am looking for contributors to help me to properly get this test software working properly on heroku.
We will most likely need a heroku custom buildpack created to instruct Heroku to install Java, and the necessary PHP extensions.

Once installed correctly on heroku, The sample output should be dispalyed:
 http://yourherokuapp.com/pos
 The 	dog 	sheds 	a 	lot
 DT 	NN 	VBZ 	DT 	NN
 
 If you are unsure on how to Deploy a Laravel App on Heroku there is some good documentation here:[https://devcenter.heroku.com/articles/getting-started-with-laravel](https://devcenter.heroku.com/articles/getting-started-with-laravel)
 
 
 ## Java Requirements for the Stanford Tagger
 I found the text below off of Stanfords Webpage that is usefull when setting up your environment, and is what we will need to ensure is on heroku: 

 "Stanford Tagger Java's Usage notes
  
  The current version of the parser requires Java 8 or later. (You can also download an old version of the parser, version 1.4, which runs under JDK 1.4, version 2.0 which runs under JDK 1.5, version 3.4.1 which runs under JDK 1.6, but those distributions are no longer supported.) The parser also requires a reasonable amount of memory (at least 100MB to run as a PCFG parser on sentences up to 40 words in length; typically around 500MB of memory to be able to parse similarly long typical-of-newswire sentences using the factored model).
  
  The parser is available for download, licensed under the GNU General Public License (v2 or later). Source is included. The package includes components for command-line invocation, a Java parsing GUI, and a Java API.
  
  The download is a 261 MB zipped file (mainly consisting of included grammar data files). If you unpack the zip file, you should have everything needed. Simple scripts are included to invoke the parser on a Unix or Windows system. For another system, you merely need to similarly configure the classpath."""
 
 ## Deliverables

I have posted a job on upwork to get some immediate help on this project. Here is what I am hoping to achieve:


  1) Demonstrate that this demo app properly runs on Heroku, and properly displays the output I listed on https://some-address.herokuapp.com/pos
 The 	dog 	sheds 	a 	lot
 DT 	NN 	VBZ 	DT 	NN

  2) Create a README that illustrates the steps necessary to to get a heroku deploy configured correctly for this app to interface with the Stanford Tagger

  3) Commit custom buildpacks and other extensions that are needed for the above
  
## Goal
    
For interests sake, I'll just add what my goal is here.  After being asked to convert thousands of lines of text into its constituent pieces, and specify their parts of speech, I came across The Stanford Tagger and got it producing the output that was needed.  In order to scale this however, and be able to process thousands of lines of text, I need to take advantage of Laravel Queing Architecture, and Heroku's Hardware Scaling solutions. 

By coupling these powerful technologies, lots of possibilities exist for language learning apps.
The only roadblock for me right now, is setting the environment correctly on heroku. 

I hope you can help us move forward to this aim.


  

