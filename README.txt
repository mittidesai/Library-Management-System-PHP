LIBRARY MANAGEMENT SYSTEM


TECHNOLOGIES USED:
PHP, JQUERY, JSON, HTML5, CSS3.

DATABASE: 
MYSQL

The project starts with the landing of -->index.html file hosted on the MAMP sever.

Type--> localhost:8888/index.html in the browser for the home page.

There are various options available for the librarian namely,

1) Explore (explore.html,explore.php)---> To browse through the available books using their ISBN number, Name, Author,etc.
2) Check Out (checkout.html,checkout.php)---> This allows the librarian to check out a book for a particular borrower. Hence updates the database as well. 
3) Check In (checkin.html,checkin.php,onclickcheckin.php)---> This allows the librarian to check in a book that had been checked out earlier and it checks if the borrower excceded its due date, if yes updates the amount of fine due for him and maintains it.
4) Borrower (borrower.html, borrower.php)---> This allows the librarian to create a new borrower by entering various values.
5) Fines (fines.html,refreshfines.php,payment.php)---> This maintains the fines of each borrower and displays the latest fines by using the refresh button and also allows to pay the fines by updating the value of fine to be zerp after payment.


