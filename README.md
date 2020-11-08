##Laravel_Passport_V8.x


1 - Clone to your directory 

2 - install passport 

3 - Run migration

4 - Run DatabaseSeeder

5 - then use from Api in Directory => api.php


Api =>   1 - http://127.0.0.1:8000/api/register
                
             @post
             -------------------
             | name
             ---------
             | email
             ---------
             | username
              ---------
             | password
             ------------------
         
         
         
         2 - http://127.0.0.1:8000/api/login
         
             @post
             ------------------
             | username
              ---------
             | password
             ------------------
             
         
         3 - http://127.0.0.1:8000/api/products
             
             @get
             ------------------
             | Bearer {Token}
             ------------------
         
         
