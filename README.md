# simple_bloglike_page
This simple blog has login/signup page (which is pro forma), it's main feature is for users to write and post messages in blog-like 
manner. It uses ajax for simple user information retrieval (which are: date when user joined the site and how many posts user posted) this
is done by hovering with mouse over the username of user.

<img src="https://cloud.githubusercontent.com/assets/22999740/19862337/2930fcaa-9f90-11e6-9137-c20130c5362d.png" />

<img src="https://cloud.githubusercontent.com/assets/22999740/19862374/48b35cee-9f90-11e6-8724-35d75fcf3471.png" />

Database is done in MySQL and consists of two tables, one for user information and one for message information.
Tables are joined with users.id = blogs.user_id.
