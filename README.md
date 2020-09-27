

## Program to test the Stanford Parts of Speech Tagger on a Laravel App deployed on Heroku 
This is a sample Laravel App that will demonstrate the use of the The Stanford Natural Language Processing Groups's Parts of Speech Tagger.

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
 
 To use Deploy a Laravel App on Heroku, please go to [https://devcenter.heroku.com/articles/getting-started-with-laravel](https://devcenter.heroku.com/articles/getting-started-with-laravel)
 
 
 ## Java Requirements
 I found the text below off of Stanfords Webpage that is usefuly when setting up your environment, and what we need to ensure on heroku: 

 "Usage notes
  
  The current version of the parser requires Java 8 or later. (You can also download an old version of the parser, version 1.4, which runs under JDK 1.4, version 2.0 which runs under JDK 1.5, version 3.4.1 which runs under JDK 1.6, but those distributions are no longer supported.) The parser also requires a reasonable amount of memory (at least 100MB to run as a PCFG parser on sentences up to 40 words in length; typically around 500MB of memory to be able to parse similarly long typical-of-newswire sentences using the factored model).
  
  The parser is available for download, licensed under the GNU General Public License (v2 or later). Source is included. The package includes components for command-line invocation, a Java parsing GUI, and a Java API.
  
  The download is a 261 MB zipped file (mainly consisting of included grammar data files). If you unpack the zip file, you should have everything needed. Simple scripts are included to invoke the parser on a Unix or Windows system. For another system, you merely need to similarly configure the classpath."""
 
 ## Deliverables
 
  1) You need to demonstrate that this demo app properly runs on Heroku, and properly display the output I listed above.
  2) Create a README that illustrates the steps necessary to to get a heroku deploy configured correctly for this app to interface with the Stanford Tagger
  3) Commit custom buildpacks and other extensions that are needed for the above
  
## Goal
    
If we can if we this Sample Program working on Heroku, then we will have opened the door to some exciting and powerful technologies.
By coupling Laravel's slick Queuing Architecture, along with Heroku's ability to scale, Parts of Speech tagging on large volume of text can be achieved.

I hope you can help us move forward to this aim.


  

