# Genshin-Website
Side projects

Description:
  This project is an Apache-based dynamic website implemented by PHP, MySQL, CSS, HTML, and JavaScript. 
  It has a simple database that allows users to register accounts to order foods and browse their purchasing history. 
  
How to run the website on your computer:
  Start the website
    1. Download Docker and follow its instruction to install.
    2. Open the docker desktop and wait for it to fully start.
    3. Open the command prompt and go to the directory of this project.
    4. Type the command docker-compose up to initial the website.
    
  Input data
    1. Open a browser (Google is preferred). Type “localhost:8080” in the URL section.
    2. Input data into the database 
    3. Type "root" on the username section in the website of "localhost:8080"
    4. Type the password "MYSQL_ROOT_PASSWORD"
    5. Go to the import section. 
    6. Click choose file and select the "onlineordering.sql" file and click the import button at the bottom
  
  Use the website
    1. Type "localhost:8000" to go to the website
    
 Bug to be fixed:
    1. Due to the design of the code, if the user refreshes the website during inputting addresses for their order delivery. 
       An error may occur when they return to the site next time
       
Avaliable Account:
    Username: Traveller
    Password: 123456
