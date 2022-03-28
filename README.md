1-  generate Qr code for every user to view his card with all of his information and Accounts links .

2- using : laravel Authentication for login and registeration.

3- laratrust package for handling users Roles.

4- Dashboard to view and control users data .

5- Repository design pattern.


documintation :

-  Admin have permission to view all users details and links and can edit or delete users , can add icons or edit and delete it and view all users cards.
-  user can only view his details and links and modify or delete it ,generate his code , view his card .


-------------------------------------------------

routes documintation :

/admin/users   --->  get table contain all users .

/admin/userlinks/{link->id}   -----> get the chosen user from all users table links .

/admin/rolechange/{user->id}    ------> get the page to edit user role

/admin/rolechange/        -------> change user rules to admin and viceversa.

---------------------------------

/user    ------> table contain user details and alink routes to user links .

/user/update/{user->id}   ------> 




