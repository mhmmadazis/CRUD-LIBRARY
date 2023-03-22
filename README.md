# CRUD-LIBRARY
CRUD library website that allows users to manage books and loans in a library system
 
 
CRUD library website that allows users to manage books and loans in a library system. The website have 3 levels of login: admin, librarian, and member. Each level have different access and permissions to the database tables.

The admin level be able to access all tables: admin, member, book, category, book loaned, book returned, and reported. The admin level be able to add new admins or librarians; view all members; add new books or categories; view all books by category; view all book loans by member; view all book returns by member; view all reported books by member.

The librarian level be able to access only three tables: book loaned, book returned, and reported. The librarian level should be able to view all books by category; loan books to members; return books from members; report damaged or lost books by members.

The member level be able to access only one table: book loaned. The member level should be able to view only their own book loans; request new book loans; cancel existing book loans.

The website built using PHP and SQL for the back-end and HTML, CSS, and JavaScript for the front-end. The website also be responsive and compatible with different browsers and devices.
