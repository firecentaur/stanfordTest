

## Program to test the Stanford Parts of Speech Tagger on a Laravel App deploped on Heroku 
This is a sample Laravel App that will demonstrate the use of the The Stanford Natural Language Processing Groups's Parts of Speech Tagger.

The Tagger is actually a Java program, but since Laravel is a PHP Architecture Platform, we will be using [a PHP Wrapper written by Patrick Schur](https://github.com/patrickschur/stanford-nlp-tagger) to interface with the Tagger.

I have created a web endpoint to Test the tagger at the following endoint of the app  http://localhost/pos/

This endpoint should display two table rows with the following: 
 
 The 	dog 	sheds 	a 	lot
 DT 	NN 	VBZ 	DT 	NN
 
 
 The above works properly when I run it from my local machine.
 I am unable, however to get this running on heroku.
 I am looking for contributors to help me to properly get this test software working properly on heroku.  This may in a heroku buildpack and installing the correct modules for the stanford tagger to work.  To get it working on my local machine, I had to do the following:
 
 * Install php7.3
 * Install [php7.3-psell](https://packages.debian.org/buster/php7.3-pspell)
 * Install Java
 
 From The stanford page, I found this text regarding Java requirments
 
 "Usage notes
  
  The current version of the parser requires Java 8 or later. (You can also download an old version of the parser, version 1.4, which runs under JDK 1.4, version 2.0 which runs under JDK 1.5, version 3.4.1 which runs under JDK 1.6, but those distributions are no longer supported.) The parser also requires a reasonable amount of memory (at least 100MB to run as a PCFG parser on sentences up to 40 words in length; typically around 500MB of memory to be able to parse similarly long typical-of-newswire sentences using the factored model).
  
  The parser is available for download, licensed under the GNU General Public License (v2 or later). Source is included. The package includes components for command-line invocation, a Java parsing GUI, and a Java API.
  
  The download is a 261 MB zipped file (mainly consisting of included grammar data files). If you unpack the zip file, you should have everything needed. Simple scripts are included to invoke the parser on a Unix or Windows system. For another system, you merely need to similarly configure the classpath."""
 
 
  
My hope is that, with this test, if we can get the Stanford Tagger working on Heroku through laravel, we can harness powerful text processing through the use of Laravel Queues and Heroku Scaling abilities.

I will be posting a job on Upwork at the moment to see if I can find some immediate help with this.


