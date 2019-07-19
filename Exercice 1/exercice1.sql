/*Exercise 1: « Let’s join! »
We have 2 SQL table:

Table “users” Table “articles”

● id
● firstname
● lastname
● email
● role

● id
● title
● content
● picture
● date_publish
● id_user

In a separate file, write the SQL request to display an article (id = 10) and his author using a
junction.
Note: ​Only write the SQL request, not the PHP.*/


//Anwser:

SELECT a.title, u.firstname AS "author"
FROM articles a
INNER JOIN  users u
ON a.id_user = u.id
WHERE a.id = 10; 