# abstraction
## add service abstraction
## add controller abstraction(optional)
## add dao abstraction(optional)
## add a view abstraction and overwrite frontend(optional)

# Functionality
## a login page
## login logic
## session/cookie to remember login state
## shopping cart frontend (implementation,better be a stand alone page)
## shopping cart functionality(notice: you don't have to login to add things to your shopping cart)
## a check out function 


# Features


## styling issues related to cart and so on
## login navbar change should be displayed earily
## fix card display issue
## responsiveness
## message is not aligned in index


# Note
## PDO is not necessary
## keep the original registerForm.php and the contactForm.php
## set up login as a floating window //
## in a php query, first return number rows, secondly return the assoc array(maintainable) 


## ERROR CODE
### product service 
-101 : product not be found (empty)
-111: could not get price by product ID
-121: no cart items found
### Account service 
-201 : Database error: multiple results for the given email and password
-202 : user is not found for the given email and password
-211 : sign up email already exists
### checkout service
-301 : checkout error - unknown source

