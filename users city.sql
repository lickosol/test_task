select city.city as город, firstName, lastName 
from user
inner join city on user.city = city.id