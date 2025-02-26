Instructions for Using the Professional Syndicate Application
Introduction
Welcome to the Professional Syndicate application. This app is designed to provide different features for different roles in the organization. Depending on your role (Executive, Manager, Associate, Internal Advisor, or User), you will have access to specific screens and functions.

The application is built using Laragon, which already includes Composer, so no additional installations are needed. Once you log in, the app will adjust to your role and display the functions you can access.

Getting Started
Step 1: Open the Application
Start Laragon and make sure Apache and MySQL are running.
Open your browser and go to http://localhost (or the address where your app is hosted).
Step 2: Log In
On the homepage, you’ll see a button called "Enter". Click it to go to the Login Screen.
Log in with your username and password.
Depending on your role (Executive, Manager, Associate, Internal Advisor, or User), you will be taken to your personalized dashboard.
Step 3: Role-Based Dashboards
Once logged in, you will be shown a dashboard that matches your role. Here’s what each role can do:

Executive
As an Executive, you can:

Create and edit users (add or modify users).
Create projects and teams.
View all reviews across the platform.
Manager
As a Manager, you can:

Temporarily switch to an Internal Advisor role for another project.
View reviews of your projects and reviews from your team members.
Internal Advisor
As an Internal Advisor, you can:

View project reviews.
Write reviews for the projects you're involved with.
Associate
As an Associate, you can:

Temporarily switch to an Internal Advisor role for a project.
View project reviews (including your own and your team's reviews).
Write reviews for your team.
User
As a User, you can:

Edit or delete your own reviews.
Update any reviews you’ve written.
Security and Access Control
The application uses middleware to ensure that each user can only access the features allowed for their specific role. This means that only users with the correct role can use certain functions. You don’t need to worry about additional verification steps—everything is securely managed based on your role.

Database and Seed Data
The application uses seeders to populate the database with sample data. This helps to simulate real data and allows for a smooth user experience during development and testing.

Conclusion
This app is built to be secure, simple, and easy to use. When you log in, you will see the dashboard that matches your role, with access to only the features relevant to you. Enjoy using the app, and let us know if you have any questions or issues!
