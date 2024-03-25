
# 10tech

An e-commerce website focused on tech.

To see live deployment, follow this link:
-
https://220081838.cs2410-web01pvm.aston.ac.uk/TenTechWebsite/public/shop





## Demo

Before demo-ing this project, ensure that you have the following prerequisite installed on your local system.

- PHP version >= 7.x
- Composer for autoloading
- XAMPP for a local MYSQL database and local web server

In order to seed the database with default dummy data, use the following command:

```bash
php artisan migrate:fresh --seed --seeder=ProductSeeder
```

Two default accounts can be used when seeded:

```bash
Normal user account:
User email: test@test.com
User password: 1
```

```bash
Admin user account:
User email: admin@admin.com
User password: 1
```

## Screenshots
Login as a customer:
-

![App Screenshot](https://github.com/AQ-GB/10tech/blob/main/TenTechWebsite/public/loginreadme.png?raw=true)

Or you can register:
-

![App Screenshot](https://github.com/AQ-GB/10tech/blob/main/TenTechWebsite/public/registerreadme.png?raw=true)

You will come to the home screen as a customer:
-
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/homescreencustprt1.png)
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/homescreencustprt2.png)

From the home screen, you can navigate the user settings:
-
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/homescreencustdropdown.png)

Where you will come to the user settings view:
-
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/settingsviewreadme.png)

You can access the order history from here: 
-
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/orderhistryreadme.png)

Where you can click on a product by its Order ID to view the details:
-
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/orderdetailsreadme.png)

You can add a new card in the settings menu
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/entercardetailsreadme.png)

You can enter new address details in the settings menu:
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/enteraddreessinforeadme.png)

You can update your password in the settings menu:
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/enterpasswordreadme.png)

You can enter a new profile picture in the settings menu:
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/enterpfpreadme.png)

You are also free to delete the account: 
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/deleteaccountreadme.png)

You can add a product to your basket:
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/addedtobasketreadme.png)

You can go to the basket, and apply a promo code
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/applypromocodereadme.png)

You can then continue to checkout page and use existing credentials, or use new credentials
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/checkoutreadme.png)

You can complete the order:
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/completeorderreadme.png)

You can use the search bar to search for products:
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/searchbarreadme.png)

Admin Screenshots
-

Logging in as an admin will take you to the dashboard page rather than the shop page:
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/admindashreadme.png)


You can then view all the orders that have been made at TenTech:
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/ordersadminprt1readme.png)

![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/ordersadminprt2readme.png)

You can also see all of the users that are registered with your store:
- 
![App Screenshot](https://raw.githubusercontent.com/AQ-GB/10tech/main/TenTechWebsite/public/usersreadmeadmin.png)