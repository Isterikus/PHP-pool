SELECT genre.id_genre 'id_genre', genre.name 'name_genre', distrib.id_distrib 'id_distrib', distrib.name 'name_distrib', film.title 'title_film' FROM film
LEFT JOIN distrib ON distrib.id_distrib = film.id_distrib
LEFT JOIN genre ON film.id_genre = genre.id_genre
WHERE (genre.id_genre > 3 AND genre.id_genre < 9);