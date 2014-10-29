# Task planner

Some items have dependencies that require you to complete in a certain order. Other may allow you to take an iterative approach where you can build out some functionality in various parts, then add others as you go along.

## Development Environment

This is partly dependent on what you have to work with, and how you've chosen to tackle the project, such as PHP vs ASP. 

  * _Hosting: development web service_ - XAMPP is a good option for having a development environment on a local machine. This enables you to test as you go along without exposing unfinished interfaces to the rest of the world. XAMPP includes PHP.
  * _Hosting: development database backend_ - XAMPP includes MySQL. You will need something to store the site data. 
  * _editor or IDE_ - a decent text editor, such as Notepad++, would be a minimum I suggest. There are integrated development enviroments, like NetBeans - which we use in the Java class, that could be useful, as long as the learning curve does not get in the way. Choose whatever moves you along the task list the quickest.
  * _Hosting: demonstration site_ - If you do not have an external host where you can upload and publish the code, along with the database content, you will need to plan to set up your site on a machine for class demonstration.
  * _Payment Processing Sandbox accounts_ - In order to develop the check out process, you will need to integrate a method for providing payment. I am looking at a service called Stripe which has gained popularity, and will add more about that later as I continue researching.

## Site Tasks

### Set up database schema and sample data

We'll start out simple for the purpose of the project. In practice, you will want to optimize further for scalability and maintenance. An example of this will be a category field containing text versus a separate category table linked by unique ID. 

#### Table Inventory


#### Table Shopping Cart

### Set up site page structure

You can sketch this out on paper, then start by placing HTML placeholder files with links between. 

  * Administrative Interface
    * Admin Login
      * Admin landing page
        * Display Inventory
          * Add Inventory Item
          * Update/Deactivate Inventory Item
  * Customer Interface
    * Customer landing page
      * View digital catalog
        * View Item Detail
          * Add to shopping cart
      * View shopping cart
      * Checkout

### Building modules/functionality

These are things that we'll need to code for various parts, no particular order:

  * query a database
  * use a loop to build an HTML table from database results
  * insert an item into a database
  * update an item in a database
  * authenticate a user
  * adjust inventory quantity
  * capture user information for checkout
  * session management for shopping cart
  * use a payment processor API