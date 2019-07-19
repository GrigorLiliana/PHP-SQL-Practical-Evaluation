/*Exercise 1: « Let’s join! »
 write the SQL request to display an article (id = 10) and his author using a
junction.
*/

//Anwser:

SELECT a.*, u.firstname AS "author"
FROM articles a
INNER JOIN  users u
ON a.id_user = u.id
WHERE a.id = 10; 