select city.city as �����, firstName, lastName 
from user
inner join city on user.city = city.id